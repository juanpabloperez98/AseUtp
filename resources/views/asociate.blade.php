@extends('base')
@section('title','Asociate')

@section('content')
<div class="card-group mx-auto p-5" style="width: 60%; height: 60%;">
    <div class="card align-center">
        <div class="card-body bg-light">

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


            <h3 class="card-tittle text-center font-italic">Asóciate ya</h3><br><br>

            <form class="flex text-center" action="{{route('asociatecreate')}}" method="post">
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}} </li>                    
                        @endforeach
                        </ul>                    
                    </div>
                @endif        



                <div class="form-group ">
                    <label for="nombre">Escriba su nombre</label>
                    <input class="form-control " type="text" name="name" id="name">
                </div>
                <div class="form-group ">
                    <label for=" ">Escriba su correo electronico</label>
                    <input class="form-control " type="email" name="email" id="email">
                </div>

                <div class="form-group ">
                    <label for="about">Cuéntanos por qué quieres pertenecer a esta comunidad</label>
                    <textarea class="form-control " name="about" id="about" cols="30 " rows="10 "></textarea>
                </div>

                <button class="btn btn-primary btn-block ">Enviar</button>

            </form>





        </div>
    </div>
</div>
    
@endsection
    
