<?php

namespace App\Http\Controllers;
use \App\Admin;
use \App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function profile($id)    
    {
        $admin = Admin::where('user_id',$id)->first();        
        return view('perfil',array(
            'usuario' => $admin
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
        return view('root.crearAdmin');
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
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'docLogin' => ['required','numeric'],
            'dir' => ['required','string'],
            'tel' => ['required','integer','digits:10'],
            'codigoS' => ['required','integer','digits:5'],
        ]);




        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->tipo_usuario = 'admin';
        $user->clave = $request->input('codigoS');

        $user->save();



        $admin = new Admin();
        $admin->tipo_documento = $request->input('tipoDoc');
        $admin->documento = $request->input('docLogin');
        $admin->direccion = $request->input('dir');
        $admin->user_id = $user->id;
        $admin->save();
        $user->assignRoles('admin');

        return redirect()->route('admin.create')->with(array(
            'message' => 'El administrador se ha creado correctamente!!'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
