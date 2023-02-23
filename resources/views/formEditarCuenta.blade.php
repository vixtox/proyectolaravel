@extends('base')

@section('contenido')
    <div class="cabecera">
        <h3>Formulario editar cuenta</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <form method="post" action="{{ route('editarCuenta', $empleado) }}" id="formulario" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="" class="form-label">Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') ?? $empleado->email }}">
            {!! $errors->first('email', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label">Teléfono</label>
            <input class="form-control" type="text" name="telefono" value="{{ old('telefono') ?? $empleado->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label">Dirección</label>
            <input class="form-control" type="text" name="direccion" value="{{ old('direccion') ?? $empleado->direccion }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label">Fecha de alta</label>
            <input class="form-control" type="date" name="fecha_alta"
                value="{{ old('fecha_alta') ?? $empleado->fecha_alta }}">
            {!! $errors->first('fecha_alta', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>

        <div id="boton" class="col-md-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-success" href="{{ route('listaEmpleados') }}">Volver</a>
        </div>

    </div>

    </form><br><br>
@endsection
