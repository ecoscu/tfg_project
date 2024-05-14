<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForoController extends Controller
{

    public function showforo(){

        return view('foro');
    }
}