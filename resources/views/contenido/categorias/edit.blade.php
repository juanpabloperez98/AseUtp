@extends('base')

@section('title','Ver Detalle')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto my-5">
            <div class="jumbotron jumbotron-fluid p-5" style="border-radius: 30px;">

                @if(session('info'))
                
                
                    <div class="alert alert-success text-center mb-5">
                        {{ session('info')}}
                    </div>                                       
                

                
                @endif


                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}} </li>                    
                            @endforeach
                        </ul>                    
                    </div>
                @endif  




                <div class="container">                    
                  <h1 class="display-4 p-3" style="background-color: #b2bec3">Crear Etiqueta</h1>
                  
                  

                  <div class="container body my-5">
                      {!! Form::model($category, ['route' =>['categories.update',$category->id],'method'=>'PUT']) !!}                      
                        @include('contenido.categorias.partials.form')

                      {!! Form::close() !!}

                      
                  </div>                  

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection


