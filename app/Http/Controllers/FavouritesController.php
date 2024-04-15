<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavouritesController extends Controller
{
    public function addFavorite($content_id)
    {
        $userID = Auth::user()->id;
        
        $existingFavorite = Favourites::where('user_id', $userID)
            ->where('contenidos_id', $content_id)
            ->first();

        if ($existingFavorite) {
            Favourites::where('user_id', $userID)
                ->where('contenidos_id', $content_id)
                ->delete();
        } else {
            
            $fav = new Favourites;
            $fav->user_id = $userID;
            $fav->contenidos_id = $content_id;
            $fav->save();
        }

        $pagContent = Contenido::where('id', $content_id)->pluck('slug')->first();

        return Redirect::to('/content/' . $pagContent);
    }
}