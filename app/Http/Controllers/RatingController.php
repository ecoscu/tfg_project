<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Contenido;


class RatingController extends Controller
{

    public function media($content_id){

        $contador = 0;
        $sumrates = 0;

        $ratings = Rating::where('contenidos_id', $content_id)->pluck('rating');

        foreach ($ratings as $rate){
            $sumrates = $sumrates + $rate;
            $contador ++;
        }

        if($contador == 0){
            $media = 0;
        }else{
          $media = $sumrates/$contador;  
        }

        Contenido::where('id', $content_id)->update(['Rating' => $media]);
    }

}