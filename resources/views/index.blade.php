@extends('base')

@section('title', 'UTP')
    
@section('content')
    <section>
        
            <div class="container pt-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-sm-12">
                    <h1 class=" pt-1 text-uppercase text-dark font-italic">Haz parte de la comunidad de egresados de la UTP</h1>
                </div>
            </div>
                <div class="row pt-4  pb-5 align-items-around justify-content-around text-center pl-4">
                    <div class="col-sm-12">
                    <p class=" display-4  text-dark font-weight-light mb-5">Encuentra tus compañeros, chatea, contáctalos y entérate de las últimas noticias para los egresados UTP</p>
                    @guest
                        <div class="justify-content-around">
                            <a class="btn btn-dark btn-xl" href="{{route('register')}}">Registrarse</a>

                            <a class="btn btn-dark btn-xl" href=" {{route('login')}}">Iniciar Sesión</a>
                            <a class="btn btn-dark btn-xl" href="{{route('asociate')}} ">Asociate ya</a>
                        </div>                        
                    @endguest
                </div>
                </div>
            
            </div>

    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{!!asset ('img/landing2.jpg')!!} " alt="Img1">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4 text-center">Acerca del proyecto</h2>
                        <p>Este proyecto nace con la necesidad de implementar tecnología web para la materia Laboratorio de software de la Universidad Tecnológica de pereira. Representa un desafío para llevar a cabo, dodne se reunen conocimientos de diseño,
                            desarrollo, ingeniería de software y demás, para proporcionar un producto.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{!! asset('img/landing3.jpg')!!}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4 text-center">Equipo de trabajo</h2>
                        <p>El grupo de trabajo lo compone Cristian A. Arce, Valentina Rendón y Luis D. Restrepo. Un grupo de estudiantes de noveno semestre de la Universidad Tecnológica de Pereira
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection