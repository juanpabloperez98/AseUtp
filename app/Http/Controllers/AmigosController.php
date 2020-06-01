<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


use App\Egresados;
use App\User;
use App\SolicitudesFriends;
use App\RelationUser;


class AmigosController extends Controller
{
    //

    public function listar_amigos(){

        $frase = \Request::get('search');


        if(is_null($frase)){                     
          
            // $egresados = Egresados::has('solicitudes')->get();

            $usuarios = User::where([
                ['id','!=',\Auth::user()->id],
                ['tipo_usuario','egresado']
            ])->paginate(5);
            
        }else{


            $usuarios = User::where([
                ['id','!=',\Auth::user()->id],
                ['tipo_usuario','egresado'],
                ['name','LIKE','%'.$frase.'%']
            ])->paginate(5);

        }
        

        return view('amigos.listar_usuarios',[
            'users'=>$usuarios
        ]);
    }

    public function solicitud_amistad($id){

        $solicitud = new SolicitudesFriends();
        $solicitud->user_id = \Auth::user()->id;
        $solicitud->egresado_id = $id;        
        $solicitud->save();

        

        return redirect()->back()->with([
            'message' => 'Solicitud mandada con exito!!'
        ]);
    }


    public function ver_solicitud_amistad_enviada(){     
        $solicitudes = SolicitudesFriends::where('user_id',\Auth::user()->id)->paginate(5);
        
        return view('amigos.solicitudes_enviadas',[
            'solicitudes' => $solicitudes,
            'status' => 1
        ]);
    }

    public function ver_solicitudes(){
        $usuario = \Auth::user();
        $solicitudes = SolicitudesFriends::where('egresado_id',$usuario->egresado->id)->paginate(5);

        /* foreach($solicitudes as $solicitud){
            echo $solicitud.'<br> <br>';
        }
        die(); */

        return view('amigos.solicitudes',[
            'solicitudes' => $solicitudes            
        ]);
        
    }

    public function aceptar(Request $request,$id){

        /* echo $id.'<br> <br>';
        echo \Auth::user()->egresado->id;

        die(); */


        $solicitud = SolicitudesFriends::where([
            ['user_id', $id],
            ['egresado_id', \Auth::user()->egresado->id]
        ])->first();

        $solicitud->status = 'ACCEPTED';
        $solicitud->update();

        
        
        $amistad = new RelationUser();
        $amistad->user_id = \Auth::user()->id;
        $amistad->egresado_id = $id;
        $amistad->save();


        

        return redirect()->route('ver.solicitudes')->with([
            'message'=>'Aceptado en sus amigos'
        ]);
        
    }

    public function rechazar(Request $request,$id){

        $solicitud = SolicitudesFriends::where([
            ['user_id', $id],
            ['egresado_id', \Auth::user()->egresado->id]
        ])->first();


        $solicitud->status = 'REJECTED';
        $solicitud->update();

        return redirect()->route('ver.solicitudes')->with([
            'message'=>'Solicitud rechazada'
        ]);

        
    }


    public function ver_amigos(){
        $user =  \Auth::user();
        $amigos = RelationUser::where('user_id',$user->id)->orWhere('egresado_id',$user->egresado->id)->paginate(5);

        return view('amigos.listar_amigos',[
            'friends' => $amigos
        ]);
    }


}
