@extends('base')
{{-- @extends('title','recuperar contraseña') --}}
@section('title','recuperar contraseña')
    
@section('content')
<div class="card-group mx-auto p-5" style="width: 70%; height: 60%;">
    <div class="card align-center">

        @if(session('message'))


                
                @if (session('status') === 'danger')
                    <div class="alert alert-danger text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif

                @if (session('status') === 'success')
                    <div class="alert alert-success text-center mb-5">
                        {{ session('message')}}
                        <p>
                            Su contraseña es: <span class="font-weight-bold">@if (session('password')){{session('password')}}@endif</span>
                        </p>
                        
                    </div>                                       
                @endif
        
        @endif


        <div class="card-body bg-light">

            <h4 class="card-title text-center font-italic"> Recuperacion de contraseña</h4><br><br>
            <form class="flex text-center" method="POST" action="{{ route('recovery.password.post') }}">
                @csrf
                <p style="font-style: oblique;">Debe escribir los campos exactamente como los ingresó en el registro.</p><br><br>
                <div class="form-group">
                    <label for="email">Ingrese su correo institucional</label>
                    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <!-- <small id="emailHelp" class="form-text text-muted">Ingrese su correo para validarlo</small><br> -->
                </div>


                <div class=" p-2 form-group">
                    <label for="clave">Ingrese su código de seguridad</label>
                    <input required type="number" class="form-control" id="clave" name="clave" aria-describedby="emailHelp">
                    <!-- <small id="emailHelp" class="form-text text-muted">Ingrese su correo para validarlo</small><br> -->
                </div>

                <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
            </form>

        </div>
    </div>
</div>
    
@endsection

{{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam explicabo amet distinctio officia velit repellat quis voluptate, eius quisquam delectus. --}}