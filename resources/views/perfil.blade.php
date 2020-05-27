@extends('base')
@section('title','home')   

@section('content')
<div class=" card-group mx-auto p-5" style="width: 60%; height: 60%;">
    <div class="card align-center">
        @if(session('message'))
                
                @if (session('status') === 'success')
                    <div class="alert alert-success text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif  

        @endif

       
        <div class="card-header" style="background-color: rgb(224, 226, 226);">            
            <h3 class="font-italic">{{$usuario->user->name}} - {{$usuario->user->tipo_usuario}}</h3>
        </div>

        @if ($usuario->user->tipo_usuario === 'egresado')
            @include('egresados.perfil')                        
        @elseif($usuario->user->tipo_usuario === 'admin')
            @include('admin.perfil')
        @else 
            @include('root.perfil')                        
        @endif        
        
    </div>
</div>
    
@endsection