@extends('base')
@section('title','Solicitudes enviadas')

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-lg-12 text-center">
            
            <h1 class="display-3">Solicitudes de amistad enviadas</h1>
            
        </div>

            @if(count($solicitudes)>0)

                @foreach ($solicitudes as $solicitud)

                
                    <div class="col-lg-5 p-5 mx-auto">
                        <div class="card mx-auto" style="width: 18rem;">       
                            
                            @if ($solicitud->egresados->foto)
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{{ url('image/'.$user->egresado->foto) }}" width="200" alt="imagenperfil">                            
                            @else
                                <img class="img-fluid rounded-circle mx-auto my-3" src="{!!asset('img/indice.png')!!}" width="200" alt="imagenperfil">                            
                            @endif                        

                            

                            <div class="card-body">
                            <h5 class="card-title">{{ $solicitud->egresados->user->name }}</h5>
                            <p class="font-weight-blod">{{ $solicitud->egresados->edad }}</p>
                            <p class="font-weight-blod">{{ $solicitud->egresados->programa }}</p>

                            
                            @if ($solicitud->status == 'WAIT')
                                <p class="btn btn-warning">En lista de espera</p>
                            @elseif($solicitud->status == 'ACCEPTED')
                                <p class="btn btn-success">Amigos</p>
                            @else
                                <p class="btn btn-danger">No aceptado</p>                            
                            @endif
                            
                                {{-- <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Aceptar</button>
                                </form>
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">No Aceptar</button>
                                </form> --}}
                            

                            
                            {{-- <a href="{{ route('agregar.amigos', ['id'=>$user->id]) }}" class="btn btn-primary">Agregar Amigos</a> --}}
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



