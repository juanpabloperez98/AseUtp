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

            <form action="{{ route('register') }}" enctype="multipart/form-data" method="POST" class="flex text-center">
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
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese sus nombres" value="{{old('name')}}">
                    <!-- <small class="form-text text-muted"> Ingrese su nombre completo</small> -->
                </div>

                <div class="form-group">
                    <label class="text-bold" for="lastname">Apellidos</label>
                    <input required class="form-control" type="text" placeholder="Ingrese sus apellidos" id="lastname" name="lastname" value="{{old('lastname')}}">
                </div>

                <div class="form-group">
                    <label class="text-bold" for="tipoDoc">Tipo de documento</label><br>
                    <select class="btn btn-warning" name="tipoDoc" id="tipoDoc">
                        <!-- <option value="">---</option> -->
                        <option value="cedula ciudadanía">Cédula de ciudadanía</option>
                        <option value="cedula extrajera">Cédula de extranjería</option>
                        <option value="pasaport">Pasaporte</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-bold" for="documento">Documento</label>
                    <input required class="form-control" type="number" placeholder="Ingrese su documento" id="documento" name="documento" value="{{old('documento')}}">
                </div>

                <div class="form-group">
                    <label class="text-bold d-block" for="email">Correo electronico</label>
                    <input required type="text" name="email" class="form-control" placeholder="Correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{old('email')}}">
                    {{-- <div class="input-group-append d-inline-block">
                        <span class="input-group-text" id="basic-addon2">@utp.edu.co</span>
                    </div> --}}
                </div>
                <br>
                <div class="form-group">
                    <label class="text-bold d-block" for="edad">Edad</label>
                    <input required type="number" name="edad" class="form-control" placeholder="edad" value="{{old('edad')}}">
                </div>
                <br>
                <div class="form-group">
                    <label class="text-bold" for="pais">Pais de residencia</label><br>

                    <select name="pais" class="btn btn-warning">                        
                        <option value="Afganistán" id="AF">Afganistán</option>
                        <option value="Albania" id="AL">Albania</option>
                        <option value="Alemania" id="DE">Alemania</option>
                        <option value="Andorra" id="AD">Andorra</option>
                        <option value="Angola" id="AO">Angola</option>
                        <option value="Anguila" id="AI">Anguila</option>
                        <option value="Antártida" id="AQ">Antártida</option>
                        <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                        <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                        <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                        <option value="Argelia" id="DZ">Argelia</option>
                        <option value="Argentina" id="AR">Argentina</option>
                        <option value="Armenia" id="AM">Armenia</option>
                        <option value="Aruba" id="AW">Aruba</option>
                        <option value="Australia" id="AU">Australia</option>
                        <option value="Austria" id="AT">Austria</option>
                        <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                        <option value="Bahamas" id="BS">Bahamas</option>
                        <option value="Bahrein" id="BH">Bahrein</option>
                        <option value="Bangladesh" id="BD">Bangladesh</option>
                        <option value="Barbados" id="BB">Barbados</option>
                        <option value="Bélgica" id="BE">Bélgica</option>
                        <option value="Belice" id="BZ">Belice</option>
                        <option value="Benín" id="BJ">Benín</option>
                        <option value="Bermudas" id="BM">Bermudas</option>
                        <option value="Bhután" id="BT">Bhután</option>
                        <option value="Bielorrusia" id="BY">Bielorrusia</option>
                        <option value="Birmania" id="MM">Birmania</option>
                        <option value="Bolivia" id="BO">Bolivia</option>
                        <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                        <option value="Botsuana" id="BW">Botsuana</option>
                        <option value="Brasil" id="BR">Brasil</option>
                        <option value="Brunei" id="BN">Brunei</option>
                        <option value="Bulgaria" id="BG">Bulgaria</option>
                        <option value="Burkina Faso" id="BF">Burkina Faso</option>
                        <option value="Burundi" id="BI">Burundi</option>
                        <option value="Cabo Verde" id="CV">Cabo Verde</option>
                        <option value="Camboya" id="KH">Camboya</option>
                        <option value="Camerún" id="CM">Camerún</option>
                        <option value="Canadá" id="CA">Canadá</option>
                        <option value="Chad" id="TD">Chad</option>
                        <option value="Chile" id="CL">Chile</option>
                        <option value="China" id="CN">China</option>
                        <option value="Chipre" id="CY">Chipre</option>
                        <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                        <option value="Colombia" id="CO">Colombia</option>
                        <option value="Comores" id="KM">Comores</option>
                        <option value="Congo" id="CG">Congo</option>
                        <option value="Corea" id="KR">Corea</option>
                        <option value="Corea del Norte" id="KP">Corea del Norte</option>
                        <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                        <option value="Costa Rica" id="CR">Costa Rica</option>
                        <option value="Croacia" id="HR">Croacia</option>
                        <option value="Cuba" id="CU">Cuba</option>
                        <option value="Dinamarca" id="DK">Dinamarca</option>
                        <option value="Djibouri" id="DJ">Djibouri</option>
                        <option value="Dominica" id="DM">Dominica</option>
                        <option value="Ecuador" id="EC">Ecuador</option>
                        <option value="Egipto" id="EG">Egipto</option>
                        <option value="El Salvador" id="SV">El Salvador</option>
                        <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                        <option value="Eritrea" id="ER">Eritrea</option>
                        <option value="Eslovaquia" id="SK">Eslovaquia</option>
                        <option value="Eslovenia" id="SI">Eslovenia</option>
                        <option value="España" id="ES">España</option>
                        <option value="Estados Unidos" id="US">Estados Unidos</option>
                        <option value="Estonia" id="EE">Estonia</option>
                        <option value="c" id="ET">Etiopía</option>
                        <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                        <option value="Filipinas" id="PH">Filipinas</option>
                        <option value="Finlandia" id="FI">Finlandia</option>
                        <option value="Francia" id="FR">Francia</option>
                        <option value="Gabón" id="GA">Gabón</option>
                        <option value="Gambia" id="GM">Gambia</option>
                        <option value="Georgia" id="GE">Georgia</option>
                        <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                        <option value="Ghana" id="GH">Ghana</option>
                        <option value="Gibraltar" id="GI">Gibraltar</option>
                        <option value="Granada" id="GD">Granada</option>
                        <option value="Grecia" id="GR">Grecia</option>
                        <option value="Groenlandia" id="GL">Groenlandia</option>
                        <option value="Guadalupe" id="GP">Guadalupe</option>
                        <option value="Guam" id="GU">Guam</option>
                        <option value="Guatemala" id="GT">Guatemala</option>
                        <option value="Guayana" id="GY">Guayana</option>
                        <option value="Guayana francesa" id="GF">Guayana francesa</option>
                        <option value="Guinea" id="GN">Guinea</option>
                        <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                        <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                        <option value="Haití" id="HT">Haití</option>
                        <option value="Holanda" id="NL">Holanda</option>
                        <option value="Honduras" id="HN">Honduras</option>
                        <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                        <option value="Hungría" id="HU">Hungría</option>
                        <option value="India" id="IN">India</option>
                        <option value="Indonesia" id="ID">Indonesia</option>
                        <option value="Irak" id="IQ">Irak</option>
                        <option value="Irán" id="IR">Irán</option>
                        <option value="Irlanda" id="IE">Irlanda</option>
                        <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                        <option value="Isla Christmas" id="CX">Isla Christmas</option>
                        <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                        <option value="Islandia" id="IS">Islandia</option>
                        <option value="Islas Caimán" id="KY">Islas Caimán</option>
                        <option value="Islas Cook" id="CK">Islas Cook</option>
                        <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                        <option value="Islas Faroe" id="FO">Islas Faroe</option>
                        <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                        <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                        <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                        <option value="Islas Marshall" id="MH">Islas Marshall</option>
                        <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                        <option value="Islas Palau" id="PW">Islas Palau</option>
                        <option value="Islas Salomón" d="SB">Islas Salomón</option>
                        <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                        <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                        <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                        <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                        <option value="Israel" id="IL">Israel</option>
                        <option value="Italia" id="IT">Italia</option>
                        <option value="Jamaica" id="JM">Jamaica</option>
                        <option value="Japón" id="JP">Japón</option>
                        <option value="Jordania" id="JO">Jordania</option>
                        <option value="Kazajistán" id="KZ">Kazajistán</option>
                        <option value="Kenia" id="KE">Kenia</option>
                        <option value="Kirguizistán" id="KG">Kirguizistán</option>
                        <option value="Kiribati" id="KI">Kiribati</option>
                        <option value="Kuwait" id="KW">Kuwait</option>
                        <option value="Laos" id="LA">Laos</option>
                        <option value="Lesoto" id="LS">Lesoto</option>
                        <option value="Letonia" id="LV">Letonia</option>
                        <option value="Líbano" id="LB">Líbano</option>
                        <option value="Liberia" id="LR">Liberia</option>
                        <option value="Libia" id="LY">Libia</option>
                        <option value="Liechtenstein" id="LI">Liechtenstein</option>
                        <option value="Lituania" id="LT">Lituania</option>
                        <option value="Luxemburgo" id="LU">Luxemburgo</option>
                        <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                        <option value="Madagascar" id="MG">Madagascar</option>
                        <option value="Malasia" id="MY">Malasia</option>
                        <option value="Malawi" id="MW">Malawi</option>
                        <option value="Maldivas" id="MV">Maldivas</option>
                        <option value="Malí" id="ML">Malí</option>
                        <option value="Malta" id="MT">Malta</option>
                        <option value="Marruecos" id="MA">Marruecos</option>
                        <option value="Martinica" id="MQ">Martinica</option>
                        <option value="Mauricio" id="MU">Mauricio</option>
                        <option value="Mauritania" id="MR">Mauritania</option>
                        <option value="Mayotte" id="YT">Mayotte</option>
                        <option value="México" id="MX">México</option>
                        <option value="Micronesia" id="FM">Micronesia</option>
                        <option value="Moldavia" id="MD">Moldavia</option>
                        <option value="Mónaco" id="MC">Mónaco</option>
                        <option value="Mongolia" id="MN">Mongolia</option>
                        <option value="Montserrat" id="MS">Montserrat</option>
                        <option value="Mozambique" id="MZ">Mozambique</option>
                        <option value="Namibia" id="NA">Namibia</option>
                        <option value="Nauru" id="NR">Nauru</option>
                        <option value="Nepal" id="NP">Nepal</option>
                        <option value="Nicaragua" id="NI">Nicaragua</option>
                        <option value="Níger" id="NE">Níger</option>
                        <option value="Nigeria" id="NG">Nigeria</option>
                        <option value="Niue" id="NU">Niue</option>
                        <option value="Norfolk" id="NF">Norfolk</option>
                        <option value="Noruega" id="NO">Noruega</option>
                        <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                        <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                        <option value="Omán" id="OM">Omán</option>
                        <option value="Panamá" id="PA">Panamá</option>
                        <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                        <option value="Paquistán" id="PK">Paquistán</option>
                        <option value="Paraguay" id="PY">Paraguay</option>
                        <option value="Perú" id="PE">Perú</option>
                        <option value="Pitcairn" id="PN">Pitcairn</option>
                        <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                        <option value="Polonia" id="PL">Polonia</option>
                        <option value="Portugal" id="PT">Portugal</option>
                        <option value="Puerto Rico" id="PR">Puerto Rico</option>
                        <option value="Qatar" id="QA">Qatar</option>
                        <option value="Reino Unido" id="UK">Reino Unido</option>
                        <option value="República Centroafricana" id="CF">República Centroafricana</option>
                        <option value="República Checa" id="CZ">República Checa</option>
                        <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                        <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                        <option value="República Dominicana" id="DO">República Dominicana</option>
                        <option value="Reunión" id="RE">Reunión</option>
                        <option value="Ruanda" id="RW">Ruanda</option>
                        <option value="Rumania" id="RO">Rumania</option>
                        <option value="Rusia" id="RU">Rusia</option>
                        <option value="Samoa" id="WS">Samoa</option>
                        <option value="Samoa occidental" id="AS">Samoa occidental</option>
                        <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                        <option value="San Marino" id="SM">San Marino</option>
                        <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                        <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                        <option value="Santa Helena" id="SH">Santa Helena</option>
                        <option value="Santa Lucía" id="LC">Santa Lucía</option>
                        <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                        <option value="Senegal" id="SN">Senegal</option>
                        <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                        <option value="Sychelles" id="SC">Seychelles</option>
                        <option value="Sierra Leona" id="SL">Sierra Leona</option>
                        <option value="Singapur" id="SG">Singapur</option>
                        <option value="Siria" id="SY">Siria</option>
                        <option value="Somalia" id="SO">Somalia</option>
                        <option value="Sri Lanka" id="LK">Sri Lanka</option>
                        <option value="Suazilandia" id="SZ">Suazilandia</option>
                        <option value="Sudán" id="SD">Sudán</option>
                        <option value="Suecia" id="SE">Suecia</option>
                        <option value="Suiza" id="CH">Suiza</option>
                        <option value="Surinam" id="SR">Surinam</option>
                        <option value="Svalbard" id="SJ">Svalbard</option>
                        <option value="Tailandia" id="TH">Tailandia</option>
                        <option value="Taiwán" id="TW">Taiwán</option>
                        <option value="Tanzania" id="TZ">Tanzania</option>
                        <option value="Tayikistán" id="TJ">Tayikistán</option>
                        <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                        <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                        <option value="Timor Oriental" id="TP">Timor Oriental</option>
                        <option value="Togo" id="TG">Togo</option>
                        <option value="Tonga" id="TO">Tonga</option>
                        <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                        <option value="Túnez" id="TN">Túnez</option>
                        <option value="Turkmenistán" id="TM">Turkmenistán</option>
                        <option value="Turquía" id="TR">Turquía</option>
                        <option value="Tuvalu" id="TV">Tuvalu</option>
                        <option value="Ucrania" id="UA">Ucrania</option>
                        <option value="Uganda" id="UG">Uganda</option>
                        <option value="Uruguay" id="UY">Uruguay</option>
                        <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                        <option value="Vanuatu" id="VU">Vanuatu</option>
                        <option value="Venezuela" id="VE">Venezuela</option>
                        <option value="Vietnam" id="VN">Vietnam</option>
                        <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                        <option value="Yemen" id="YE">Yemen</option>
                        <option value="Zambia" id="ZM">Zambia</option>
                        <option value="Zimbabue" id="ZW">Zimbabue</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <label for="description">Una descripcion tuya</label><br>
                    <textarea required class="form-control" placeholder="Cuéntanos de ti..." name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                </div>

                <br>

                <div class="form-group">
                    <label class="text-bold" for="opcionesPrograma">Escoge el programa</label>
                    <select class="form-control btn btn-warning" name="opcionesPrograma" id="opcionesPrograma">
                        <option value="Ingenierias">Ingenierias</option>
                        <option value="Licenciaturas">Licenciaturas</option>
                        <option value="Bellas artes">Bellas artes</option>
                        <option value="Ambiental">Ambiental</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="genero">Escoge el genero</label>
                    <select class="form-control btn btn-warning" name="genero" id="genero">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>                        
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
                    <input required class="form-control" placeholder="Ingrese su contraseña" type="password" id="password" name="password">
                </div>

                <br>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                    
                        <input required id="password-confirm" type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
                        
                    </div>
                <br>

                <div class="form-group ">
                    <label style="font-style: oblique;" for="clave">Código de seguridad (Escribe un PIN numérico para el administrador)</label>
                    <input required class="form-control" type="number" placeholder="5 digitos " id="clave" name="clave">
                    <small class="form-text text-muted ">Este código será requerido cuando desees recuperar la contraseña (5 digitos)</small>
                </div>

                <div class="form-check form-check-inline mb-5">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" required>
                    <label class="form-check-label ml-2" for="inlineCheckbox1">
                        <a href="{{ route('terminos-condiciones') }}">Acepto los terminos y condiciones</a>
                    </label>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Registrarse</button>
                
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
