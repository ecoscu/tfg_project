<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\Favourites;
use App\Models\ForoComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ForoCommentRequest;

class ForoController extends Controller
{

    public function showforo(){
        abort_unless(Auth::check(), 401);

        $foroComments = ForoComment::orderBy('created_at', 'desc')->get();

        return view('foro', ['foroComments' => $foroComments]);
        
    }

    public function saveforocomment(ForoCommentRequest $request){
        abort_unless(Auth::check(), 401);
        $userID = Auth::user()->id;

        $comment = new ForoComment;
        $comment->user_id = $userID;
        $comment->comment = $request->input('comment');

        $res = $comment->save();

        return Redirect::to('/foro/');
    }

    public function deletecomment($comments_id){
        abort_unless(Auth::check(), 401);

        ForoComment::where('id', $comments_id)->delete();      

        return Redirect::to('/foro/');
    }
}