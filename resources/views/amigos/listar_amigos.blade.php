@extends('base')
@section('title','Amigos')

@section('content')


<div class="container">
    @if (session('message'))
        <div class="alert alert-success text-center mb-5 mx-auto my-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="row my-5">

        <div class="col-lg-12 text-center">
            <h1 class="display-3">Lista de Amigos</h1>
        </div>

        

        
            @if (count($friends) > 0)
                @foreach ($friends as $friend)
                    <div class="col-lg-5 p-5 mx-auto">

                        <div class="card mx-auto" style="width: 18rem;">

                            @if ($friend->user_id != \Auth::user()->id)

                                @if ($friend->user->egresado->foto)
                                    <img class="img-fluid rounded-circle mx-auto my-3" src="{{ url('image/'.$user->egresado->foto) }}" width="200" alt="imagenperfil">                            
                                @else
                                    <img class="img-fluid rounded-circle mx-auto my-3" src="{!!asset('img/indice.png')!!}" width="200" alt="imagenperfil">                            
                                @endif

                                <div class="card-body">

                                    <h5 class="card-title">{{ $friend->user->name }}</h5>
                                    <p class="font-weight-blod">{{ $friend->user->egresado->edad }} años</p>
                                    <p class="font-weight-blod">{{ $friend->user->egresado->programa }}</p>


                                    <a href="{{route('perfil.egresados',['user'=>$friend->user->id]) }}" class="btn btn-success">Ver Perfil</a>



                                </div>
                            
                            @else
                                
                                @if ($friend->egresado->foto)
                                    <img class="img-fluid rounded-circle mx-auto my-3" src="{{ url('image/'.$friend->egresado->foto) }}" width="200" alt="imagenperfil">                            
                                @else
                                    <img class="img-fluid rounded-circle mx-auto my-3" src="{!!asset('img/indice.png')!!}" width="200" alt="imagenperfil">                            
                                @endif

                            <div class="card-body">

                                <h5 class="card-title">{{ $friend->egresado->user->name }}</h5>
                                <p class="font-weight-blod">{{ $friend->egresado->user->edad }} años</p>
                                <p class="font-weight-blod">{{ $friend->egresado->programa }}</p>

                                <a href="{{route('perfil.egresados',['user'=>$friend->egresado->user->id]) }}" class="btn btn-success">Ver Perfil</a>

                            </div>

                                
                            @endif
                        
                        
                        
                        
                        </div>

                    </div>
                @endforeach
            @else
                    
                <div class="col-lg-5 p-5 mx-auto bg-light my-5">
                    
                    <h1 class="display-5">No hay Amigos</h1>

                </div>
                
            @endif

            
                
        



    </div>

    <div class="custom-pagination-brand-blue">
        {{$friends->render()}}
    </div>



</div>


    
@endsection


{{-- 


<div class="card mx-auto" style="width: 18rem;">             
                            

                            @if ($user->egresado->foto)
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{{ url('image/'.$user->egresado->foto) }}" width="200" alt="imagenperfil">                            
                            @else
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{!!asset('img/indice.png')!!}" width="200" alt="imagenperfil">                            
                            @endif

                            <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="font-weight-blod">{{ $user->egresado->edad }} años</p>
                            <p class="font-weight-blod">{{ $user->egresado->programa }}</p>

                            

                            @if (count(App\SolicitudesFriends::where([
                                ['egresado_id',$user->egresado->id],
                                ['user_id',\Auth::user()->id]
                            ])->orWhere([
                                ['egresado_id',\Auth::user()->egresado->id],
                                ['user_id',$user->id]
                            ])->get()) > 0)


                               
                                

                                @if (App\SolicitudesFriends::where([
                                    ['egresado_id',$user->egresado->id],
                                    ['user_id',\Auth::user()->id]
                                ])->orWhere([
                                    ['egresado_id',\Auth::user()->egresado->id],
                                    ['user_id',$user->id]
                                ])->get()[0]->status == 'WAIT')

                                <p class="btn btn-warning">En lista de espera</p>

                                    
                                @endif


                                @if (App\SolicitudesFriends::where([
                                    ['egresado_id',$user->egresado->id],
                                    ['user_id',\Auth::user()->id]
                                ])->orWhere([
                                    ['egresado_id',\Auth::user()->egresado->id],
                                    ['user_id',$user->id]
                                ])->get()[0]->status == 'ACCEPTED')

                                <p class="btn btn-success">Amigos</p>

                                    
                                @endif


                                @if (App\SolicitudesFriends::where([
                                    ['egresado_id',$user->egresado->id],
                                    ['user_id',\Auth::user()->id]
                                ])->orWhere([
                                    ['egresado_id',\Auth::user()->egresado->id],
                                    ['user_id',$user->id]
                                ])->get()[0]->status == 'REJECTED')

                                <p class="btn btn-danger">No aceptado</p>

                                    
                                @endif
                                
                            @else
                            
                                <a href="{{ route('agregar.amigos', ['id'=>$user->egresado->id]) }}" class="btn btn-primary">Agregar Amigos</a>
                            @endif
                            
                            </div>
                        </div>
    
    
--}}