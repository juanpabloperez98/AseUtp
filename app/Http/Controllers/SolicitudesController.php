<?php

namespace App\Http\Controllers;

use App\Solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudesController extends Controller
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

    public function vervalidacion(){
        return view('validacion');

    }


    public function statusvalidacion(Request $request){
        
        $solicitud = Solicitudes::where('email',$request->input('email'))->first();

        $message = "";

        if(!empty($solicitud) && $solicitud->estado == 1){
            $message = 'Su solicitud ha sido aceptada puede registrarse con su correo electronico';
            return redirect()->route('vervalidacion')->with(array(
                'message'=>$message,
                'status'=>'success'
            ));
        }elseif(empty($solicitud)){
            $message = 'No se ha realizado ninguna solicitud con este correo electronico, por favor envie una solicitud para ser aprobada';
            return redirect()->route('asociate')->with(array(
                'message'=>$message,
                'status'=>'danger'
            ));
        }else{
            $message = 'Su solicitud aun no ha sido aceptada';
            return redirect()->route('vervalidacion')->with(array(
                'message'=>$message,
                'status'=>'danger'
            ));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('asociate');

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

        $validate = $this -> validate($request,[
            'name'=>'required|max:255|string',
            'email'=>'required|string|email|unique:solicitudes',
            'about'=>'required|string'

        ]);

        //$email_= DB::table('solicitudes')->where('email',$request->input('email'))->first();

        

        $solicitud = new Solicitudes;
        $solicitud->nombre = $request -> input('name');
        $solicitud->email = $request -> input('email');
        $solicitud->descripcion = $request -> input('about');
        $solicitud->estado = 0;

        $solicitud->save();
        $message='Su solicitud ha sido enviada';

        

        return redirect()->route('asociate')->with(array(
            'message'=>$message,
            'status'=>'success'
        ));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitudes  $solicitudes
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitudes $solicitudes)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitudes  $solicitudes
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitudes $solicitudes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitudes  $solicitudes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitudes $solicitudes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitudes  $solicitudes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitudes $solicitudes)
    {
        //
    }
}
