@extends('base')

@section('titulo', 'Formulario registro empleads')

@section('contenido')

<div class="cabecera">
    <h3>Formulario registro empleado</h3>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>

    <form method="POST" action="{{ route('registroEmpleado') }}" class="row g-3" id="formulario">
        @csrf

        <div class="col-md-6">
            <label class="form-label"><b>Nombre y apellidos</b></label>
            <input class="form-control" type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos') }}">
            {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>DNI</b></label>
            <input class="form-control" type="text" name="dni" value="{{ old('dni') }}">
            {!! $errors->first('dni', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Correo</b></label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input class="form-control" type="text" name="correo" value="{{ old('correo') }}">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Teléfono</b></label>
            <input class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Dirección</b></label>
            <input class="form-control" type="text" name="direccion" value="{{ old('direccion') }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Fecha alta</b></label>
            <input class="form-control" type="date" name="fecha_alta" value="{{ old('fecha_alta') }}">
            {!! $errors->first('fecha_alta', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Tipo</b></label><br>
            <label class="form-label">Admin</label>
            <input class="form-check-input" type="radio" name="es_admin" value="1"
                {{ old('es_admin') == '1' ? 'checked' : '' }}>&nbsp;
            <label class="form-label">Operario</label>
            <input class="form-check-input" type="radio" name="es_admin" value="0"
                {{ old('es_admin') == '0' ? 'checked' : '' }}><br>
            {!! $errors->first('es_admin', '<span style="color: red;">:message</span>') !!}
        </div>
        <div id="boton" class="col-md-12">
            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </div>
    </form>

@endsection
