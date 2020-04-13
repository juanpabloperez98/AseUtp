@extends('base')
@section('title','Validar Asociacion')

@section('content')
<div class=" card-group mx-auto p-5" style="width: 70%; height: 60%;">
    <div class="card align-center">
        <div class=" card-body bg-light">
            @if(session('message'))
                
                @if (session('status') === 'danger')
                    <div class="alert alert-danger text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif

                @if (session('status') === 'success')
                    <div class="alert alert-success text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif
                 
                
            @endif
            <h4 class="card-title text-center font-italic"> Validacion de correo para registro</h4><br><br>
            <form class="flex text-center" method="POST" action="{{route('validar')}}">
                @csrf
                <p style="font-style: oblique;">Acá puede verificar si tu solicitud de asociación fue aceptada</p>
                <div class="form-group">
                    <label for="correoLogin">Ingrese su correo</label>
                    <input required type="email" name="email" class="form-control" id="correoValidacion" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Ingrese su correo para validarlo</small><br>
                </div>
                <button type="submit" class="btn btn-primary">Validar </button>
            </form>
        </div>
    </div>
</div>    
@endsection

