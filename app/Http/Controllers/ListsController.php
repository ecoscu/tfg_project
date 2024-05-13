<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfilePageController;

class ListsController extends Controller
{
    public function create()
    {
        return view('lists');
    }

    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401);

        $userID = Auth::user()->id;

        $lists = new Lists;
        $lists->name = $request->input('name');
        $lists->privacy = $request->input('privacy') == 'public' ? true : false;
        $lists->description = $request->input('descripcion');
        $lists->user_id = $userID ;

        $lists->save();
    }


}