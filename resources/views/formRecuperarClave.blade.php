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
    <title>Recuperar contraseña</title>
    <style>
        #formulario,
        #cabecera {
            margin-left: 5em;
            margin-right: 5em;
        }

        #boton,
        h3,h1 {
            text-align: center;
        }

        .container{
            margin-top: 50px;
            padding: 10px;
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

    <div class="container">
        <h1>NOSECAEN SL</h1>
    </div>


    <hr>

    <div class="cabecera">
        <h3>Formulario registro cliente</h3>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    </div>

    <hr>

    <div>
        <form method="post" action="{{ route('recuperarClave') }}" id="formulario" class="row g-3">
            @csrf
    
            <div class="col-md-12">
                <label for="" class="form-label"><b>Email</b></label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                {!! $errors->first('email', '<span style="color: red;">:message</span>') !!}
            </div>
            <br>
            <div class="col-md-12">
                <label for="" class="form-label"><b>DNI</b></label>
                <input class="form-control" type="text" name="dni" value="{{ old('dni') }}">
                {!! $errors->first('dni', '<span style="color: red;">:message</span>') !!}
            </div>
            <br>
            <div id="boton" class="col-md-12">
                <button class="btn btn-primary">Recordar contraseña</button>
                <a class="btn btn-success" href="{{ route('login') }}">Volver</a>
            </div>
        </form>
    </div>

</body>

</html>
