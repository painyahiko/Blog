<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function scopeTitle($query, $title)
    {
        if($title != "")
        {
            $query->where('title' , 'LIKE', "%$title%");
        }
        
    }

    public function scopeUser($query, $rol)
    {

        if($rol != "")
        {

            $query->wherehas('user' , function($q) use ($rol){


                $q->where('rol_id','=',$rol);
            });
        }
        
    }

    public function scopeCategory($query, $category)
    {
        if($category != "")
        {
            $query->wherehas('categories' , function($q) use ($category){


                $q->where('category_id','=',$category);
            });
        }
        
    }

    public static function findToView($id)
    {
          $post = Post::findOrFail($id);

          $modificado = preg_replace('/\n/', "<br/>", $post->content);

          return $modificado;

    }



    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }


    public function comments(){
        return $this->hasMany('App\Comment');
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }

}
