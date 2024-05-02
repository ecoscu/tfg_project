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


class ContentController extends Controller
{
    public function show()
    {
        abort_unless(Auth::check(), 401);
        $contents = Contenido::get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'All';

        return view('home',  ['title' => $title, 'contents' => $contents]);
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
            $content->Rating = $request->input('rating');

            $res = $content->save();
        } else {
            return "No se ha enviado ninguna imagen.";
        }

        return $this->show();
    }

    public function slug($slug){

        abort_unless(Auth::check(), 401);
        
        $userID = Auth::user()->id;
        $content = Contenido::where('slug', $slug)->first();
        
        $colorF = 'white';
        $colorW = 'white';
        
        $checkFavorite = Favourites::where('user_id', $userID)
            ->where('contenidos_id', $content->id)
            ->first();
            
        if($checkFavorite != null){
            $colorF = 'red';
        }

        $checkWatched = Watched::where('user_id', $userID)
            ->where('contenidos_id', $content->id)
            ->first();
            
        if($checkWatched != null){
            $colorW = '#6DE851';
        }

        $comments = Comment::where('contenidos_id', $content->id)->get();

        return view('content', [
            'content' => $content,
            'colorF' => $colorF,
            'colorW' => $colorW,
            'comments' => $comments
        ]);
    }
    
    public function movies(){
        abort_unless(Auth::check(), 401);
        $contents = Contenido::where('Type','Movie')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'Movies';

        return view('home',  ['title' => $title, 'contents' => $contents]);
    }

    public function series(){
        abort_unless(Auth::check(), 401);
        $contents = Contenido::where('Type','Series')->get();

        foreach ($contents as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $title = 'Tv Shows';

        return view('home',  ['title' => $title, 'contents' => $contents]);
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

        $title = 'Resultados de la Busqueda "'  .$query.  '" ';

        return view('home', compact('contents','title'));
    }
}
