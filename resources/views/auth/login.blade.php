@extends('base')
@section('title','Login')   

@section('content')

<div class="row">

    <div class=" card-group mx-auto p-5" style="width: 70%; height: 60%;">
        <div class="col-lg-6 col-12">

            @if(session('message'))
                
                @if (session('status') === 'success')
                    <div class="alert alert-success text-center mb-5">
                        {{ session('message')}}
                    </div>                                       
                @endif                             
            @endif


            <div class="card align-center">

                <div class=" card-body bg-light">                    

                    <h4 class="card-title text-center font-italic"> Iniciar Sesión </h4><br><br>

                    <form class="flex text-center" method="POST" action="{{ route('login') }}">
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
                            <label for="email">Correo electrónico</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">
                            <small class="form-text text-muted" id="passwordHelp">Ingrese su correo electronico</small><br>

                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                            
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> --}}
                            <small class="form-text text-muted" id="passwordHelp">Ingrese su contraseña</small><br>


                        </div>

                        <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                        </div> -->


                        <div>
                            <h6 class="text-muted">Aún no eres parte de esta comunidad?</h6>
                            <a href="{{ route('register') }}"> ¡Regístrate ya!</a> <br><br>
                            <small class="text-muted">No recuerdo mi contraseña</small>
                            <a href="#">Recuperar mi contraseña</a> <br><br>
                        </div>

                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <img src="img/imglogin.jpg" class="img-fluid" alt="ImagenLogin ">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}