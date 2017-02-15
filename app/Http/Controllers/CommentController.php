<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CreateCommentRequest;
use App\Comment;

class CommentController extends Controller
{
    

    public function store(CreateCommentRequest $request)
    {
        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = \Auth::user()->id;
        $comment->save();

        if($comment->save()){

            return redirect()->back()->with('status', "Comentario nuevo añadido");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear el Comentario');
        }
    }

    public function destroy($id)
    {
    	$comment = Comment::findOrFail($id);
        Comment::destroy($id);

        return redirect()->back()->with('status', "Comentario Borrado");
    }


}
