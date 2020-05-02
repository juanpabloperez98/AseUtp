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
        $solicitudes = Solicitudes::orderBy('id','asc')->paginate(3);

        return view('admin.solicitudes',array(
            'solicitudes' => $solicitudes
        ));


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
        }elseif(!empty($solicitud) && $solicitud->estado == 2){
            $message = 'Su solicitud ha sido rechazada, intente hacer su solicitud con otro correo electronico';
            return redirect()->route('asociate')->with(array(
                'message'=>$message,
                'status'=>'danger'
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

    public function terminos_condiciones(){
        return view('terminos');
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     protected function Create_Solicitud($request)
     {
        $solicitud = new Solicitudes;
        $solicitud->nombre = $request -> input('name');
        $solicitud->email = $request -> input('email');
        $solicitud->descripcion = $request -> input('about');
        $solicitud->estado = 0;

        $solicitud->save();
        
        return $message='Su solicitud ha sido enviada';

     }

    public function store(Request $request)
    {
        //

        $validate = $this -> validate($request,[
            'name'=>'required|max:255|string',
            'email'=>'required|string|email|unique:solicitudes',
            'about'=>'required|string|max:600'

        ]);

        //$email_= DB::table('solicitudes')->where('email',$request->input('email'))->first();

        

        $message = $this->Create_Solicitud($request);

        

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
    public function show($id)
    {
        $solicitud = Solicitudes::findOrFail($id);

        return view('admin.versolicitud',array(
            'solicitud' => $solicitud
        ));
        
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
    public function update(Request $request,$id,$estado)
    {
        //        
        $solicitud = Solicitudes::findOrFail($id);

        $solicitud->estado = $estado;

        if($estado == 1){
            $message = 'La solicitud ha sido aceptada';
        }else{
            $message = 'La solicitud ha sido rechazada';
        }
       

        $solicitud->update();

        return redirect()->route('solicitudes.index')->with(array(
            'message' => $message
        ));

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
