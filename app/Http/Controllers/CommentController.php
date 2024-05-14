<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Commentlikes;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $request->validated();

        $userID = Auth::user()->id;

        $contentId = $request->input('contenidos_id');

        $comment = new Comment;
        $comment->user_id = $userID;
        $comment->contenidos_id = $contentId;
        $comment->comment = $request->input('comment');

        $res = $comment->save();

        return back()->withErrors(['msg', 'There was an error saving the comment, please try again later']);
    }

    public function likecomment($comments_id, $content_id){
        $userID = Auth::user()->id;
        
        $existingLike = Commentlikes::where('user_id', $userID)
            ->where('comments_id', $comments_id)
            ->first();

        if ($existingLike) {
            Commentlikes::where('user_id', $userID)
                ->where('comments_id', $comments_id)
                ->delete();

        } else {
            
            $like = new Commentlikes;
            $like->user_id = $userID;
            $like->comments_id = $comments_id;
            $like->save();
        }

        $pagContent = Contenido::where('id', $content_id)->pluck('slug')->first();

        return Redirect::to('/content/' . $pagContent);
    }
}
