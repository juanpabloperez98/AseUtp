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
                                        @else 
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item mr-4">
                                                    <a href="" class="btn btn-success">
                                                        <i class="fas fa-user-check"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="" class="btn btn-danger">
                                                        <i class="fas fa-user-times"></i>
                                                    </a>                                                    
                                                </li>
                                            </ul>
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











   