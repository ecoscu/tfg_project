<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContenidoRequest;
use App\Models\Watched;
use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Favourites;
use App\Models\Comment;
use App\Models\Lists;
use App\Models\Rating;
use App\Models\Pendings;
use App\Http\Controllers\RatingController;
use App\Models\Commentlikes;
use App\Models\ListContent;


class ContentController extends Controller
{
    public function show()
    {
        abort_unless(Auth::check(), 401);


        $filter = $this->filter('A-Z');

        $contents = $filter->contents;
        // $contents = Contenido::orderBy('name', 'ASC')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = $filter->title;

        return view('home', ['title' => $title, 'contents' => $contents]);
    }

    public function store(ContenidoRequest $request)
    {
        abort_unless(Auth::check(), 401);

        if ($request->hasFile('file')) {
            // Lee la imagen como un arreglo de bytes
            $imagen = file_get_contents($request->file('file')->getRealPath());

            $content = new Contenido;
            $content->name = $request->input('name');
            $content->Img = $imagen;
            $content->Sinopsis = $request->input('sinopsis');
            $content->Type = $request->input('type');
            $content->Genre = $request->input('genre');
            $content->ReleaseDate = $request->input('release_date');
            $content->Platform = $request->input('platform');
            // $content->Rating = $request->input('rating');
            $content->URL = $request->input('URL');

            $res = $content->save();
        } else {
            return "No se ha enviado ninguna imagen.";
        }

        return $this->show();
    }

    public function slug($slug)
    {
        abort_unless(Auth::check(), 401);

        $userID = Auth::user()->id;
        $content = Contenido::where('slug', $slug)->first();

        $colorF = 'white';
        $colorW = 'white';
        $colorR = 'white';
        $colorP = 'white';

        $checkFavorite = Favourites::where('user_id', $userID)
            ->where('contenidos_id', $content->id)
            ->first();

        if ($checkFavorite != null) {
            $colorF = 'red';
        }

        $checkWatched = Watched::where('user_id', $userID)
            ->where('contenidos_id', $content->id)
            ->first();

        if ($checkWatched != null) {
            $colorW = '#4DC4D9';
        }

        $checkRating = Rating::where('user_id', $userID)->where('contenidos_id', $content->id)->first();
        if ($checkRating != null) {
            $colorR = '#F3F32D';
        }

        $checkPending = Pendings::where('user_id', $userID)->where('contenidos_id', $content->id)->first();
        if ($checkPending != null) {
            $colorP = '#ECA643';
        }


        $comments = Comment::where('contenidos_id', $content->id)->orderBy('created_at', 'desc')->get();
        foreach ($comments as $comment) {
            $like = Commentlikes::where('user_id', $userID)
                ->where('comments_id', $comment->id)->get();

            if ($like->isEmpty()) {
                $comment->color = 'white';
            }else{
                $comment->color = 'red';
            }

            $likeCount = Commentlikes::where('comments_id', $comment->id)
                ->count();

                $comment->lcount = $likeCount;
        }

        $lists = Lists::where('user_id', $userID)->get();

        $UserRate = Rating:: where('user_id', $userID)->where('contenidos_id', $content->id)->pluck('rating')->first();

        return view('content', [
            'content' => $content,
            'colorF' => $colorF,
            'colorW' => $colorW,
            'colorR' => $colorR,
            'colorP' => $colorP,
            'comments' => $comments,
            'lists' => $lists,
            'UserRate' => $UserRate
        ]);
    }

    public function movies()
    {
        abort_unless(Auth::check(), 401);
        $contents = Contenido::where('Type', 'Movie')->orderBy('name', 'ASC')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'Movies';

        return view('home', ['title' => $title, 'contents' => $contents]);
    }

    public function series()
    {
        abort_unless(Auth::check(), 401);
        $contents = Contenido::where('Type', 'Series')->orderBy('name', 'ASC')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'Tv Shows';

        return view('home', ['title' => $title, 'contents' => $contents]);
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $contents = Contenido::where('name', 'like', '%' . $query . '%')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'Resultados de la Busqueda "' . $query . '" ';

        return view('home', compact('contents', 'title'));
    }

    public function filter($request)
    {
        if ($request == 'A-Z' || $request == '') {
            $contents = Contenido::orderBy('name', 'ASC')->get();
        } elseif ($request == 'Z-A') {
            $contents = Contenido::orderBy('name', 'DESC')->get();
        } elseif ($request == 'Recientes') {
            $contents = Contenido::orderBy('ReleaseDate', 'DESC')->get();
        } elseif ($request == 'Valoracion') {
            $contents = Contenido::orderBy('Rating', 'DESC')->get();
        }elseif ($request == 'Comedy') {
            $contents = Contenido::where('Genre', 'Comedy')->get();
        }elseif ($request == 'Drama') {
            $contents = Contenido::where('Genre', 'Drama')->get();
        }elseif ($request == 'Horror') {
            $contents = Contenido::where('Genre', 'Horror')->get();
        }elseif ($request == 'Action') {
            $contents = Contenido::where('Genre', 'Action')->get();
        }elseif ($request == 'Musical') {
            $contents = Contenido::where('Genre', 'Musical')->get();
        }elseif ($request == 'NETFLIX') {
            $contents = Contenido::where('Platform', 'NETFLIX')->get();
        }elseif ($request == 'HBO') {
            $contents = Contenido::where('Platform', 'HBO')->get();
        }elseif ($request == 'Disney+') {
            $contents = Contenido::where('Platform', 'Disney+')->get();
        }elseif ($request == 'PrimeVideo') {
            $contents = Contenido::where('Platform', 'PrimeVideo')->get();
        }elseif ($request == 'AppleTV') {
            $contents = Contenido::where('Platform', 'AppleTV')->get();
        }

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'All';

        return view('home', compact('contents', 'title'));
    }

    public function rate($content_id, $rate)
    {

        $userID = Auth::user()->id;

        // Buscar si el usuario ya ha calificado este contenido
        $existingRating = Rating::where('user_id', $userID)->where('contenidos_id', $content_id)->pluck('rating')->first();

        if ($existingRating) {
            if ($rate == $existingRating) {

                Rating::where('user_id', $userID)
                    ->where('contenidos_id', $content_id)
                    ->delete();

            } else {
                Rating::where('user_id', $userID)
                    ->where('contenidos_id', $content_id)
                    ->update(['rating' => $rate]);
            }
        } else {
            $rating = new Rating;
            $rating->user_id = $userID;
            $rating->contenidos_id = $content_id;
            $rating->rating = $rate;
            $rating->save();
        }

        $media = new RatingController;
        $media->media($content_id);

        $pagContent = Contenido::where('id', $content_id)->pluck('slug')->first();

        return Redirect::to('/content/' . $pagContent);
    }
}
