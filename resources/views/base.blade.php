<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/fav.png')}}">
    <title>@yield('titulo')</title>
    @yield('enlacesScripts')
    <style>
        #formulario,
        #cabecera {
            margin-left: 5em;
            margin-right: 5em;
        }

        #boton,
        h3 {
            text-align: center;
        }

        @import url('https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap%27');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Yanone Kaffeesatz', sans-serif;
        }
    </style>
</head>

<body>

   
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        &nbsp;&nbsp;&nbsp;&nbsp;<img src="{{ asset('img/fav.png')}}" class="img-fluid" width="50" height="50">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NOSECAEN SL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Auth::check() && Auth::user()->es_admin === 1)
                        <div class="dropdown">
                            <a id="Tareas" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tareas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('listaTareas') }}">Listar Tareas</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('insertarTarea') }}">Registrar Tarea</a>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="Clientes" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('listaClientes') }}">Listar Clientes</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('registroCliente') }}">Registrar Cliente</a>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="Empleados" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Empleados
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('listaEmpleados') }}">Listar Empleados</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('registroEmpleado') }}">Registrar
                                        Empleado</a>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a id="Cuotas" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Cuotas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('listaCuotas') }}">Listar Cuotas</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('registroCuotaMensual') }}">Registrar Cuota
                                        mensual</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('registroCuotas') }}">Registrar Cuota
                                        extraordinaria</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    @if (Auth::check() && Auth::user()->es_admin === 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaTareasOperario') }}">Listar tareas</a>
                        </li>
                    @endif

                </ul>

                @if (Auth::check())
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </nav>

    @yield('contenido')

    <br>

    <footer class="bg-dark text-center text-white">
        <br>
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/vixtox/proyectolaravel.git"
                    role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <div class="text-center p-3" style="background-color: rgb(0, 0, 0, 0.2);">
                <p class="text-white">© 2022 Copyright: NOSECAEN S.A</p>
            </div>

            <br><br><br>

    </footer>


</body>

</html>
