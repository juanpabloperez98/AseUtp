<div class="row">
    <div class="p-4 col-12 col-md-6">                
        <img class="img-fluid rounded-circle" src="{!!asset('img/indice.png')!!}" alt="imagenperfil">        
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
    </div>    
</div>