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




                <div class="container">
                  <h1 class="display-4 p-3" style="background-color: #b2bec3">Ver Categoria</h1>
                  

                  <div class="container body my-5">
                     <p><strong>Nombre: </strong>{{ $category->name }}</p>
                     <p><strong>Slug: </strong>{{ $category->slug }}</p>
                     <p><strong>Body: </strong>{{ $category->body }}</p>
                     

                      
                  </div>                  

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection


