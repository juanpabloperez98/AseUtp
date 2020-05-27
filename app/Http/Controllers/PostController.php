<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tags;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middelware('auth',['except'=>['index','show']]);
        $this->middleware('permission:contenido.index')->only(['index']);
        $this->middleware('permission:contenido.show')->only(['show']);
        $this->middleware('permission:contenido.create')->only(['create','store']);
        $this->middleware('permission:contenido.edit')->only(['edit','update']);
        $this->middleware('permission:contenido.destroy')->only(['destroy']);
    }

    public function index()
    {
        /* $post = Post::where('user_id',auth()->user()->id)
                                            ->orderBy('id','ASC')->paginate(); */
                                            
        $post = Post::orderBy('id','DESC')->paginate(); 
        return view('contenido.post.index',[
            'posts' => $post
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $tags = Tags::orderBy('name','ASC')->get();

        return view('contenido.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        
        $post = Post::create($request->all());

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.edit',$post->id)->with('info','Post creada con exito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);

        return view('contenido.post.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tags::orderBy('name','ASC')->get();
        $post = Post::find($id);


        return view('contenido.post.edit',compact('post','categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('posts.edit', $post->id)
                         ->with('info','Post Actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return back()->with('info','Post eliminado con exito!!');
    }
}
