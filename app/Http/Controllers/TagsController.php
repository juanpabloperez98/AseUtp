<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\UpdateStoreRequest;


class TagsController extends Controller
{


    public function __construct(){
        // $this->middelware('auth',['except'=>['index','show']]);
        $this->middleware('permission:contenido.index')->only(['index']);
        $this->middleware('permission:contenido.show')->only(['show']);
        $this->middleware('permission:contenido.create')->only(['create','store']);
        $this->middleware('permission:contenido.edit')->only(['edit','update']);
        $this->middleware('permission:contenido.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::orderBy('id','DESC')->paginate();

        return view('contenido.tag.index',[
            'tags' => $tags
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contenido.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {

    
        $tag = Tags::create($request->all());

        return redirect()->route('tags.edit', $tag->id)
                         ->with('info','Etiqueta Creada con exito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tags::find($id);

        return view('contenido.tag.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tags::find($id);

        return view('contenido.tag.edit',compact('tag'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, $id)
    {
        $tag = Tags::find($id);
        $tag->fill($request->all())->save();

        return redirect()->route('tags.edit', $tag->id)
                         ->with('info','Etiqueta Actualizada con exito!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tags::find($id)->delete();

        return back()->with('info','Eliminada etiqueta con exito!!');
    }
}
