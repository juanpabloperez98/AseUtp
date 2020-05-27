<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
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
     * 
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate();
        return view('contenido.categorias.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contenido.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryUpdateRequest $request)
    {
        $category = Category::create($request->all());


        return redirect()->route('categories.edit', $category->id)->with('info','Categoria creada con exito!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('contenido.categorias.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('contenido.categorias.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all())->save();

        return redirect()->route('categories.edit', $category->id)
                         ->with('info','Categoria Actualizada con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return back()->with('info','Categoria eliminada con exito!!');
    }
}
