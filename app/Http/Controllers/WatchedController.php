<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Watched;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WatchedController extends Controller
{
    public function addWatched($content_id)
    {
        $userID = Auth::user()->id;

        $colorW = 'white';
        
        $existingWatched = Watched::where('user_id', $userID)
            ->where('contenidos_id', $content_id)
            ->first();

        if ($existingWatched ) {
            Watched::where('user_id', $userID)
                ->where('contenidos_id', $content_id)
                ->delete();

        } else {
            
            $fav = new Watched;
            $fav->user_id = $userID;
            $fav->contenidos_id = $content_id;
            $fav->save();

            $colorW = '#6DE851';
        }

        $pagContent = Contenido::where('id', $content_id)->pluck('slug')->first();

        return Redirect::to('/content/' . $pagContent)->with('colorW', $colorW);
    }
}