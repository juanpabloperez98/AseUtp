@extends('base')
@section('title','versolicitud')
@section('content')

<div class="container mx-auto" style="margin: 7% 0 10% 0;">
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">{{$solicitud->nombre}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$solicitud->email}}</h6>
            <p class="card-text">{{$solicitud->descripcion}}</p>            

            @if ($solicitud->estado != 1 && $solicitud->estado != 2)
                <div class="container w-50">
                    <form class="d-inline float-left" action="{{route('solicitudes.update',['solicitud'=>$solicitud->id,'estado'=>1])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-user-check"></i>
                        </button>
                    </form>
                    <form class="d-inline float-right" action="{{route('solicitudes.update',['solicitud'=>$solicitud->id,'estado'=>2])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </form>
                </div>                
            @endif
          
        </div>
    </div>
</div>

@endsection
    
