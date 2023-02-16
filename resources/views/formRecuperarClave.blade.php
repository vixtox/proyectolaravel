<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="post" action="{{ route('recuperarClave') }}" id="formulario" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="" class="form-label"><b>Email</b></label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
            {!! $errors->first('email', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>DNI</b></label>
            <input class="form-control" type="text" name="dni" value="{{ old('dni') }}">
            {!! $errors->first('dni', '<span style="color: red;">:message</span>') !!}
        </div>

        <div id="boton" class="col-md-12">
            <button class="btn btn-primary">Recordar contraseña</button>
        </div>
    </form>
    
</body>
</html>