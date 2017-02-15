<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\User;
use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('post');
    }

     public function index(Request $request)
    {
        /*if(\Auth::user()->rol_id == '1')
        {
            return redirect()->route('index');
        }*/
        if(\Auth::user()->rol_id == '3'){

            $posts = Post::title($request->get('title'))->where('user_id','=',\Auth::user()->id)->orderBy('id','desc')->paginate(5);
            return view('backend.posts.index')->withPosts($posts);

        }else{

        $posts = Post::title($request->get('title'))->orderBy('id','desc')->paginate(5);
        return view('backend.posts.index')->withPosts($posts);
    }
    }



    public function create()
    {

        $categories = Category::all();
        return view('backend.posts.create')->withCategories($categories);
    }


    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->url = str_slug($request->input('title'));
        $post->user_id = \Auth::user()->id;
        if($post->save()){
        	$post->categories()->sync($request->input('category'));
            if($request->hasFile('imagen')){
                $image_name = $post->id . '.' . $request->file('imagen')->getClientOriginalExtension();
                $post->imagen = $image_name;
                $request->file('imagen')->move(config('upload.imagespath'), $post->imagen);
                \Image::make(config('upload.imagespath'). $post->imagen)->resize(120,120)->save(config('upload.imagespath'). 'thumb_' . $post->imagen);
                $post->save();
            }
            return redirect()->route('backend.posts.index')->with('status', "Registro número $post->id creado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear el Post');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('owner', $post);
        $categories = Category::all();

        return view('backend.posts.edit')->withPost($post)->withCategories($categories);
    }



    public function update(UpdatePostRequest $request, $id)
    {

        $post = Post::findOrFail($id);
        $this->authorize('owner', $post);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->url = str_slug($request->input('title'));

        if($post->save()){
        	$post->categories()->sync($request->input('category'));
            if($request->hasFile('imagen')){
                $image_name = $post->id . '.' . $request->file('imagen')->getClientOriginalExtension();
                $post->imagen = $image_name;
                $request->file('imagen')->move(config('upload.imagespath'), $post->imagen);
                \Image::make(config('upload.imagespath'). $post->imagen)->resize(120,120)->save(config('upload.imagespath'). 'thumb_' . $post->imagen);
                $post->save();
            }
            return redirect()->route('backend.posts.index')->with('status', "Registro número $post->id actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar el Post');
        }

    }




    public function destroy($id)
    {
    	$post = Post::findOrFail($id);

        $this->authorize('owner', $post);

    	\File::delete(config('upload.imagespath') . $post->imagen);
    	\File::delete(config('upload.imagespath') . 'thumb_' . $post->imagen);
        Post::destroy($id);

        return redirect()->route('backend.posts.index')->with('status', "Registro Borrado");
    }

}
