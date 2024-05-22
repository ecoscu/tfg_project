<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminPanelController extends Controller
{
    public function show(){
        $contenidos = Contenido::orderBy('name', 'asc')->get();

        return view('adminpanel', ['contenidos' => $contenidos]);
    }

}