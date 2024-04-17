<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContenidoRequest;
use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Favourites;

class ProfilePageController extends Controller
{

    public function profilepage()
    {

        $userID = Auth::user()->id;

        $favourites = Favourites::where('user_id', $userID)->pluck('contenidos_id');

        if ($favourites->isNotEmpty()) {
            $favouriteContent = Contenido::whereIn('id', $favourites)->get();
        } else {
            $favouriteContent = collect(); 
        }

        foreach ($favouriteContent as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        return view('profile', ['favourites' => $favouriteContent]);
    }

}



