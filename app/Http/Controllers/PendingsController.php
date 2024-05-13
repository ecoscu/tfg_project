<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Watched;
use App\Models\Pendings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PendingsController extends Controller
{
    public function addPending($content_id)
    {
        $userID = Auth::user()->id;

        $colorP = 'white';
        
        $existingPending = Pendings::where('user_id', $userID)
            ->where('contenidos_id', $content_id)
            ->first();

        if ($existingPending ) {
            Pendings::where('user_id', $userID)
                ->where('contenidos_id', $content_id)
                ->delete();

        } else {
            
            $pen = new Pendings;
            $pen->user_id = $userID;
            $pen->contenidos_id = $content_id;
            $pen->save();

            $colorP = '#ECA643';
        }

        $pagContent = Contenido::where('id', $content_id)->pluck('slug')->first();

        return Redirect::to('/content/' . $pagContent)->with('colorP', $colorP);
    }
}