<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('titulo')</title>
    <style>
        #formulario,
        #cabecera {
            margin-left: 5em;
            margin-right: 5em;
        }
        #boton, h3 {
            text-align: center;
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
                        <a class="nav-link" href="{{ route('listaTareas') }}">Listar tareas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('contenido')

</body>

</html>
