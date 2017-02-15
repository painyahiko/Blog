<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\Comment;
use App\User;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::title($request->get('title'))->user($request->get('rol_id'))->category($request->get('category_id'))->orderBy('id','desc')->paginate(5);
        
        $categories = Category::all();

        foreach ($posts as $post) {
            
            $post->user = User::findOrFail($post->user_id);
        }
        
        return view('frontend.index')->withPosts($posts)->withCategories($categories);
    }

    public function show($slug)
    {
        $post = null;
        $post = Post::with('categories')->where('url',$slug)->first();

        if(is_null($post)){
            return back()->with('status', "No existe el Post ". $slug);
        }

        $modificado = Post::findToView($post->id);
        $comments = Comment::orderBy('id','desc')->where('post_id',$post->id)->get();
        $user = User::all();

        foreach ($comments as $comment) {
            
            $comment->user = User::findOrFail($comment->user_id);
        }
        
            return view('frontend.show')->withPost($post)->withModificado($modificado)->withComments($comments);
    }
}
