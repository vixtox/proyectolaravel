@extends('base')

@section('contenido')
    <div class="cabecera">
        <h3>Formulario editar empleado</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <form method="post" action="{{ route('editarEmpleado', $empleado) }}" id="formulario" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="" class="form-label">Nombre y apellidos</label>
            <input class="form-control" type="text" name="nombre_apellidos"
                value="{{ old('nombre_apellidos') ?? $empleado->nombre_apellidos }}">
            {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label">DNI</label>
            <input class="form-control" type="text" name="dni"
                value="{{ old('dni') ?? $empleado->dni }}">
            {!! $errors->first('dni', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label">Password</label>
            <input class="form-control" type="text" name="password"
                value="{{ old('password') ?? $empleado->password }}">
            {!! $errors->first('password', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
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
        <div>
            <label for="es_admin" class="form-label">Tipo de empleado:</label>
            <br>
            <input class="form-check-input" type="radio" name="es_admin" value="0"
                {{ old('es_admin', $empleado->es_admin) == '0' ? 'checked' : '' }}> Operario
            <br>
            <input class="form-check-input" type="radio" name="es_admin" value="1"
                {{ old('es_admin', $empleado->es_admin) == '1' ? 'checked' : '' }}> Administrador
        </div>
        <div id="boton" class="col-md-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-success" href="{{ route('listaEmpleados') }}">Volver</a>
        </div>

    </div>

    </form><br><br>
@endsection
