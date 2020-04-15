@extends('base')
@section('title','home')   

@section('content')


<div class=" card-group mx-auto p-5" style="width: 80%; height: 60%;">
    <div class="card align-center">

        <div class="card-body bg-light">

            
            <div class="card-header" style="background-color: rgb(224, 226, 226);">
                <h3 class="font-italic">Visualizar solicitudes de registro</h3>
            </div>

            <div class="row">
                <div class="col m-5 text-center">
                    <h6 class="font-italic">Acá podrá ver las solicitudes hechas por parte de personas para registrarse en la página.</h6>
                </div>
            </div>

            @if (session('message'))
                <div class="alert alert-success text-center mb-5">
                    {{ session('message') }}
                </div>
                
            @endif

            <div class="row">
                <div class="col">
                    <div class="container">
                        <ul class="list-group">                                

                            @foreach ($solicitudes as $solicitud)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$solicitud->nombre}}
                                <div class="navbar navbar-expand-md navbar-dark">
                                    <div class="">
                                        @if ($solicitud->estado == 1)
                                            <span class="font-weight-bold">El usuario ya ha sido aceptado</span>                                            
                                        @elseif($solicitud->estado == 2)
                                        <span class="font-weight-bold">El usuario ha sido rechazado</span>                                            
                                        @else 
                                            @can('egresados.edit')                                                
                                                <ul class="navbar-nav mr-auto">
                                                    <li class="nav-item mr-4">                                                        
                                                        <form action="{{route('solicitudes.update',['solicitud'=>$solicitud->id,'estado'=>1])}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-user-check"></i>
                                                            </button>
                                                        </form>
                                                                                                           
                                                    </li>
                                                    <li class="nav-item">                                                                                                          
                                                        <form action="{{route('solicitudes.update',['solicitud'=>$solicitud->id,'estado'=>2])}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-user-times"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            @endcan
                                            
                                        @endif
                                    </div>
                                </div>
                            </li>                            
                            @endforeach
                            <div class="container mt-3">
                                {{$solicitudes->links()}}
                            </div>                                    

                            

                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection











   