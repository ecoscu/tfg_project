<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContenidoRequest;
use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Favourites;

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

        return view('home', ['contents' => $contents]);
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
    }

    public function slug($slug){

        abort_unless(Auth::check(), 401);
        
        $userID = Auth::user()->id;
        $content = Contenido::where('slug', $slug)->first();
        
        $color = 'white';
        
        $checkFavorite = Favourites::where('user_id', $userID)
            ->where('contenidos_id', $content->id)
            ->first();
            
        if($checkFavorite != null){
            $color = 'red';
        }

        return view('content', [
            'content' => $content,
            'color' => $color
        ]);
    }
}
