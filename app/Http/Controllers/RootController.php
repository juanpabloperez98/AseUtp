<?php

namespace App\Http\Controllers;

use App\Root;
use Illuminate\Http\Request;

class RootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile()
    {
        $user = \Auth::user();
        $root = Root::where('user_id',$user->id)->first();
        /* dd($root);
        die(); */
        return view('perfil',array(
            'usuario' => $root
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\root  $root
     * @return \Illuminate\Http\Response
     */
    public function show(root $root)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\root  $root
     * @return \Illuminate\Http\Response
     */
    public function edit(root $root)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\root  $root
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, root $root)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\root  $root
     * @return \Illuminate\Http\Response
     */
    public function destroy(root $root)
    {
        //
    }
}
