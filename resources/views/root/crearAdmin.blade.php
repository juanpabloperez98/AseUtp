@extends('base')
@section('title','creación de administradores')

@section('content')

<div class=" card-group mx-auto p-5" style="width: 80%; height: 60%;">
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
            
            <div class="card-header text-center" style="background-color: rgb(224, 226, 226);">
                <h3 class="font-italic">Crear administradores</h3>
            </div>

            <div class="row text-center">
                <div class="col-md-12 p-4">
                    <h6 class="font-italic">Apartado para crear administradores</h6>
                    <br>
                    <span class="font-italic">Favor tener cuidado con el ingreso de los datos.</span>
                </div>
            </div>
            <form class="flex text-center" method="POST" action="{{route('admin.save')}}">
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

                <hr>

                <div class="row">
                    <div class="col">
                        <div class=" align-center">
                            <div class="card-body bg-light">


                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="name">Nombres</label>
                                    <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese los nombres del administradorador" value="{{old('name')}}">
                                    <!-- <small class="form-text text-muted"> Ingrese su nombre completo</small> -->
                                </div>

                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="lastname">Apellidos</label>
                                    <input required class="form-control" type="text" placeholder="Ingrese los apellidos del administrador" id="lastname" name="lastname" value="{{old('lastname')}}">
                                </div>

                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="tipoDoc">Tipo de documento</label><br>
                                    <select class=" form-control btn btn-warning" name="tipoDoc" id="tipoDoc">
                                    <!-- <option value="">---</option> -->
                                    <option value="cedula ciudadanía">Cédula de ciudadanía</option>
                                    <option value="cedula extrajera">Cédula de extranjería</option>
                                    <option value="pasaport">Pasaporte</option>
                                </select>
                                </div>



                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="docLogin">Documento</label>
                                    <input required class="form-control" type="number" placeholder="Ingrese su documento" id="docLogin" name="docLogin" value="{{old('docLogin')}}">
                                </div>

                                <label class="" style="font-style:oblique;" for="email">Correo</label>
                                <div class="input-group">
                                    <input required id="email" name="email" type="text" class="form-control" placeholder="Correo electrónico" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{old('email')}}">                                   

                                </div>

                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="dir">Direccion</label>
                                    <input required class="form-control" type="text" placeholder="Ingrese la direccion de residencia" id="dir" name="dir" value="{{old('dir')}}">
                                </div>

                                <div class="form-group">
                                    <label class="" style="font-style:oblique;" for="tel">Telefono</label>
                                    <input required class="form-control" type="text" placeholder="Ingrese su telefono celular" id="tel" name="tel" value="{{old('tel')}}">
                                </div>                              
                                
                                <br>

                                <div class="form-group ">
                                    <p class="help-block" style="font-style:oblique;">Sube una foto de perfil</p>
                                    <label class="text-bold " for="fotoRegistroAdm">Sube una foto de perfil</label>
                                    <input class="text-center " type="file" id="fotoRegistroAdm">
                                </div>

                                <div class="form-group ">
                                    <label class="" style="font-style:oblique;" for="password">Contraseña</label>
                                    <input required class="form-control " placeholder="Ingrese la contraseña del administrador" type="password" name="password" id="password">
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
                                </div>


                                <div class="form-group ">
                                    <label style="font-style: oblique;" for="clave">Código de seguridad (Escribe un PIN numérico para el administrador)</label>
                                    <input required class="form-control" type="number" placeholder=" 5 digitos " id="clave" name="clave">
                                    <small class="form-text text-muted ">Este código será requerido cuando desees recuperar la contraseña (5 digitos)</small>
                                </div>


                                <button type="submit" class=" btn btn-primary btn-block">Crear Administrador</button>



                                <br>

                            </div>
                        </div>
                    </div>

                </div>


                <hr>

            </form>

            
        </div>
    </div>
</div>    
@endsection







