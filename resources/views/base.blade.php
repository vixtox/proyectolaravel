<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/94d5779c24.js" crossorigin="anonymous"></script>
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
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Auth::check() && Auth::user()->es_admin === 1)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('registroEmpleado') }}">Insertar Empleado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registroCliente') }}">Insertar Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('insertarTarea') }}">Insertar Tarea</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registroCuotas') }}">Insertar Cuota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registroCuotaMensual') }}">Insertar Cuota Mensual</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaTareas') }}">Listar tareas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaEmpleados') }}">Listar empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaClientes') }}">Listar clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listaCuotas') }}">Listar cuotas</a>
                        </li>
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
