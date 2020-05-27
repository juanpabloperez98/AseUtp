@extends('base')

@section('title','Ver Contenido')

@section('content')
<div class="row container mx-auto text-center">
    <div class="col-md-12 text-center mt-5">
        <h1>Ultimas noticias UTP</h1>
    </div>

    @foreach ($posts as $post)
        <div class="col-lg-4 mt-5 text-justify mx-auto">
            <div class="card mx-auto" style="width: 18rem; height: 100%;">            
                @if ($post->file)
                    <img class="card-img-top" src="{{ asset('img/landing1.jpg') }}" alt="Card image cap">                
                @else
                <img class="card-img-top" src="{{ asset('img/landing1.jpg') }}" alt="Card image cap">                
                @endif
                <div class="card-body my-5">
                    <h5 class="card-title">{{$post->name }}</h5>
                    <p class="card-text">{{$post->excerpt}}</p>
                  <a href="{{ route('noticias.post', ['slug'=>$post->slug]) }}" class="btn btn-primary" style="">Leer Más</a>
                </div>
              </div>            
        </div>
    @endforeach
    
        
    
    <div class="custom-pagination-brand-blue my-5">
        {{$posts->links()}}
    </div>
    
        
    </div>
</div>

    
@endsection


