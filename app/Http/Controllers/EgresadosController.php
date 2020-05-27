<?php

namespace App\Http\Controllers;

use App\Egresados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class EgresadosController extends Controller
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
        #$usuario = \Auth::user()->id;
        $egresado = Egresados::where('user_id',$id)->first();        
        return view('perfil',array(
            'usuario' => $egresado
        ));
    }

    public function getImage($filename){
        $file = \Storage::disk('images')->get($filename);

        

        return new Response($file,200);
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
     * @param  \App\Egresados  $egresados
     * @return \Illuminate\Http\Response
     */
    public function show(Egresados $egresados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Egresados  $egresados
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $user = \Auth::user();
        $user_comp = Egresados::where('user_id',$user->id)->first();

        
        // dd($user->id);

        return view('update',[
            'usuario' => $user,
            'component' => $user_comp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Egresados  $egresados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'doc' => ['required','numeric','digits_between:7,10'],            
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = \Auth::user();
        $egresado = Egresados::where('user_id',$user->id)->first();

        $user->name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->pass_recovery = $request->input('password');
        
        $egresado->tipo_documento = $request->input('tipoDoc');
        $egresado->documento = $request->input('doc');
        $egresado->genero = $request->input('genero');
        $egresado->programa = $request->input('opcionesPrograma');
        $egresado->pais = $request->input('pais');
        $egresado->genero = $request->input('genero');

        $user->password = Hash::make($request->input('password'));


        $egresado->update();
        $user->update();

        return redirect()->route('perfil.egresados',['user'=>$user->id])->with(array('message'=>'Datos actualizados con exito','status'=>'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Egresados  $egresados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egresados $egresados)
    {
        //
    }
}
