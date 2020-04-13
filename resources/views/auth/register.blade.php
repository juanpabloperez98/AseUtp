@extends('base')
@section('title','Registro')   


@section('content')
<section id="fondo1"></section>
<div class="card-group mx-auto p-5" style="width: 60%; height: 60%;">

    <div class="card align-center">

        <div class="card-body bg-light">

            @if(session('message'))
                
                @if (session('status') === 'danger')
                    <div class="alert alert-danger text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif     
                
                @if (session('status') === 'warning')
                    <div class="alert alert-warning text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif  
                
                
            @endif


            <h3 class="card-tittle text-center font-italic">¡Regístrate y haz parte de esta comunidad!</h3><br>

            <form action="{{ route('register') }}" method="POST" class="flex text-center">
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

                <div class="form-group">
                    <label class="font-weigth-light" for="name">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese sus nombres">
                    <!-- <small class="form-text text-muted"> Ingrese su nombre completo</small> -->
                </div>

                <div class="form-group">
                    <label class="text-bold" for="lastname">Apellidos</label>
                    <input class="form-control" type="text" placeholder="Ingrese sus apellidos" id="lastname" name="lastname">
                </div>

                <div class="form-group">
                    <label class="text-bold" for="tipoDoc">Tipo de documento</label><br>
                    <select class="btn btn-warning" name="tipoDoc" id="tipoDoc">
                        <!-- <option value="">---</option> -->
                        <option value="cc">Cédula de ciudadanía</option>
                        <option value="ce">Cédula de extranjería</option>
                        <option value="pa">Pasaporte</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-bold" for="docLogin">Documento</label>
                    <input class="form-control" type="number" placeholder="Ingrese su documento" id="docLogin" name="docLogin">
                </div>

                <div class="form-group">
                    <label class="text-bold d-block" for="email">Correo electronico</label>
                    <input type="text" name="email" class="form-control" placeholder="Correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    {{-- <div class="input-group-append d-inline-block">
                        <span class="input-group-text" id="basic-addon2">@utp.edu.co</span>
                    </div> --}}
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Una descripcion tuya</label><br>
                    <textarea class="form-control" placeholder="Cuéntanos de ti..." name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                <br>

                <div class="form-group">
                    <label class="text-bold" for="opcionesPrograma">Escoge el programa</label>
                    <select class="form-control btn btn-warning" name="opcionesPrograma" id="opcionesPrograma">
                        <option value="In">Ingenierias</option>
                        <option value="Lc">Licenciaturas</option>
                        <option value="Ba">Bellas artes</option>
                        <option value="Am">Ambiental</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <label class="text-bold" for="foto">Sube una foto de perfil</label>
                    <input class="text-center" type="file" id="foto" name="foto">
                    <!-- <p class="help-block">Sube tu foto</p> -->
                </div>

                <div class="form-group">
                    <label class="font-weigth-bold" for="password">Contraseña</label>
                    <input class="form-control" placeholder="Ingrese su contraseña" type="password" id="password" name="password">
                </div>

                <br>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                   
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
                    
                </div>
                <br>

                {{-- <button class="btn btn-primary btn-block" type="submit">Registrarse</button> --}}

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                
            </form>

            

            

        </div>

    </div>

</div>
@endsection





{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
