<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Category;

class NoticiasController extends Controller
{
    //

    public function index(){
        $posts = Post::orderBy('id','DESC')->where('status','PUBLISHED')->paginate(9);
        
        return view('contenido.index',[
            'posts' => $posts
        ]);
        
    }


    public function post($slug){
        $post = Post::where('slug', $slug)->first();

        return view('contenido.post',[
            'post' => $post
        ]);
    }


    public function category($slug){
        $category = Category::where('slug',$slug)->pluck('id')->first(); /* pluck me devuelve el id solamente */

        $posts = Post::where('category_id',$category)->orderBy('id','DESC')->where('status','PUBLISHED')->simplePaginate();

        return view('contenido.index',[
            'posts' => $posts
        ]);


        
    }

    public function tag($slug){

        // Muchos a muchos
        

        $posts = Post::whereHas('tags',function($query) use($slug){
            $query->where('slug',$slug);
        })
        ->orderBy('id','DESC')->where('status','PUBLISHED')->simplePaginate();

        return view('contenido.index',[
            'posts' => $posts
        ]);


        
    }

    



}
