<div class="row">
    <div class="p-4 col-12 col-md-6">                
        @if ($usuario->foto)
        
        <img class="img-fluid rounded-circle" src="{{ url('image/'.$usuario->foto) }}" alt="imagenperfil">                
        @else 
            <img class="img-fluid rounded-circle" src="{!!asset('img/indice.png')!!}" alt="imagenperfil">        
        @endif
    </div>
    <div class=" col-12 col-md-6 text-center">
        <div class="m-3 pt-5 pb-2">
            <label for="nombreUser"><span class="font-weight-bold">Nombres:</span> {{$usuario->user->name}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <label for="apellidoUser"><span class="font-weight-bold">Apellidos:</span> {{$usuario->user->last_name}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <span class="font-weight-bold">Correo</span>
            <label for="emailUser">{{$usuario->user->email}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <span class="font-weight-bold">Documento</span>
            <label>{{$usuario->documento}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <span class="font-weight-bold">Direccion</span>
            <label>{{$usuario->direccion}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <span class="font-weight-bold">Telefono</span>
            <label>{{$usuario->telefono}}</label>
            <br>
        </div>
        <div class="m-3 pb-2">
            <span class="font-weight-bold">Ciudad</span>
            <label>{{$usuario->ciudad}}</label>
            <br>
        </div>
    </div>
    
</div>


