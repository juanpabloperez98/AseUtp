@extends('base')

@section('title','Ver Detalle')

@section('content')

<div class="row container mx-auto my-5 w-75">
    <div class="col-lg-12 mx-auto">
        <div class="jumbotron jumbotron-fluid p-5" style="border-radius: 30px;">
            <div class="container">
              <h1 class="display-4" style="background-color: #b2bec3">{{$post->name}}</h1>
              <h2 class="display-5 my-5">
                  Categoria
                <a href="{{ route('noticias.category', ['slug'=>$post->category->slug]) }}">{{$post->category->name}}</a>
              </h2>

                @if ($post->file)
                    <img class="card-img-top" src="{{ asset('img/landing1.jpg') }}" alt="Card image cap">                
                @else
                    <p>No hay imagen</p>
                @endif

                <hr>


                <p class="lead">{!! $post->body !!}</p>


                <hr>

                <span class="font-weight-bold">Etiquetas</span>
                @foreach ($post->tags as $tag)

                <a href="{{ route('noticias.tag', ['slug'=>$tag->slug]) }}">
                    -
                    {{ $tag->name }}                    
                </a>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
    
@endsection

