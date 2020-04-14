<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand align-item-center" href="{{url('/')}}">
            <img src="{!!asset('img/logoASE.png')!!}" alt="LogoUTP"
                style="width:
                25%;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item text-white">
                        <a class="nav-link" href="{{route('login')}}">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Registrarse</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pertenece a nosotros
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="{{route('asociate')}}">Asociarse</a>
                            <a class="dropdown-item"  href="{{route('vervalidacion')}}">Ver estado</a>                                               
                        </div>                    
                    </li>
                @else
                    @can('egresados.index')
                        <li class="nav-item">
                            <a href="{{route('solicitudes.index')}}" class="nav-link">Ver solicitudes</a>
                        </li>
                    @endcan


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">                            
                            <a href="{{route('perfil.egresados',['user'=>Auth::user()->id]) }}" class="dropdown-item">Perfil</a>
                            <a href="" class="dropdown-item">Actualizar Datos</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>                    
                    </li>
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>

