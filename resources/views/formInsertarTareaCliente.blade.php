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
    <title>Formulario Tarea Cliente</title>
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

    <div class="cabecera">
        <h3>Formulario insertar tarea</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <form method="post" action="{{ route('insertarTareaCliente') }}" id="formulario" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="" class="form-label"><b>CIF Cliente</b></label>
            <input class="form-control" type="text" name="cif_cliente" value="{{ old('cif_cliente') }}">
            {!! $errors->first('cif_cliente', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Teléfono cliente</b></label>
            <input class="form-control" type="text" name="telefono_cliente" value="{{ old('telefono_cliente') }}">
            {!! $errors->first('telefono_cliente', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Persona Contacto</b></label>
            <input class="form-control" type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos') }}">
            {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Teléfono</b></label>
            <input class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Descripción</b></label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2" cols="50">{{ old('descripcion') }}</textarea>
            {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Correo</b></label>
            <input class="form-control" type="text" name="correo" value="{{ old('correo') }}">
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Dirección</b></label>
            <input class="form-control" type="text" name="direccion" value="{{ old('direccion') }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Población</b></label>
            <input class="form-control" type="text" name="poblacion" value="{{ old('poblacion') }}">
            {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Código postal</b></label>
            <input class="form-control" type="text" name="codigo_postal" value="{{ old('codigo_postal') }}">
            {!! $errors->first('codigo_postal', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="provincias_id" class="form-label"><b>Provincias</b></label>
            <select class="form-select" name="provincias_id">
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id }}" {{ old('provincias_id') == $provincia->id ? 'selected' : '' }}>
                        {{ $provincia->nombre }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Fecha de realización</b></label>
            <input class="form-control" type="date" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}">
            {!! $errors->first('fecha_realizacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div id="boton" class="col-md-12">
            <button class="btn btn-primary">Enviar tarea</button>
        </div>

    </form><br><br>

</body>

</html>
