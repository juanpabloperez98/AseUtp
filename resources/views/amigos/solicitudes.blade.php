@extends('base')
@section('title','Solicitudes enviadas')

@section('content')

<div class="container">

    @if (session('message'))
        <div class="alert alert-success text-center mb-5 mx-auto my-4">
            {{ session('message') }}
        </div>
    @endif

    
    <div class="row my-5">
        <div class="col-lg-12 text-center">
            
            <h1 class="display-3">Solicitudes de amistad</h1>
            
        </div>

            @if(count($solicitudes)>0)

                @foreach ($solicitudes as $solicitud)

                    

                    
                    <div class="col-lg-5 p-5 mx-auto">
                        <div class="card mx-auto" style="width: 18rem;">

                            
                            @if ($solicitud->user->egresado->foto)
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{{ url('image/'.$solicitud->user->egresado->foto) }}" width="200" alt="imagenperfil">                            
                            @else
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{!!asset('img/indice.png')!!}" width="200" alt="imagenperfil">                            
                            @endif                        

                            

                            <div class="card-body">
                            <h5 class="card-title">{{ $solicitud->user->name }}</h5>
                            <p class="font-weight-blod">{{ $solicitud->user->egresado->edad }}</p>
                            <p class="font-weight-blod">{{ $solicitud->user->egresado->programa }}</p>

                            
                            @if ($solicitud->status != 'ACCEPTED' && $solicitud->status != 'REJECTED')
                                <form action="{{ route('solicitud.aceptar',$solicitud->user->id ) }}" class="d-inline-block" method="post">
                                    @csrf                                
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Aceptar</button>
                                </form>
                                <form action="{{ route('solicitud.rechazar',$solicitud->user->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-times"></i> No Aceptar</button>
                                </form>
                            
                            @elseif($solicitud->status == 'REJECTED')
                                <a href="" class="btn btn-danger">Solicitud Rechazada</a>
                                
                            @else
                                <a href="" class="btn btn-success">Amigos</a>
                            @endif
                            
                            

                            </div>
                        </div>
                    </div>
        
        
                @endforeach
            
            @else
                <div class="col-lg-5 p-5 mx-auto bg-light my-5">                            
                    <h1 class="display-5">No hay solicitudes</h1>
                </div>                
            @endif



        

    </div>
</div>

@endsection