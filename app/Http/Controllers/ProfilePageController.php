<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContenidoRequest;
use App\Models\Watched;
use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Favourites;
use App\Models\Lists;
use App\Models\Pendings;

class ProfilePageController extends Controller
{

    public function profilepage()
    {
        abort_unless(Auth::check(), 401);
        
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

        $watched = Watched::where('user_id', $userID)->pluck('contenidos_id');

        if ($watched->isNotEmpty()) {
            $watchedContent = Contenido::whereIn('id', $watched)->get();
        } else {
            $watchedContent = collect();
        }


        foreach ($watchedContent as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $pendings = Pendings::where('user_id', $userID)->pluck('contenidos_id');

        if ($pendings->isNotEmpty()) {
            $pendingsContent = Contenido::whereIn('id', $pendings)->get();
        } else {
            $pendingsContent = collect();
        }

        foreach ($pendingsContent as $content) {
            // Convierte la imagen a base64
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }
        }

        $lists = Lists::where('user_id', $userID)->get();

        return view(
            'profile',
            ['favourites' => $favouriteContent, 
            'watched' => $watchedContent, 
            'pendings' => $pendingsContent,
            'lists' => $lists]
            
        );
    }

}



