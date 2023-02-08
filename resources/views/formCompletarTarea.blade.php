@extends('base')

@section('titulo', 'Formulario completar tarea')

@section('contenido')

<div class="cabecera">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h3>Formulario registro cuota mensual</h3>
</div>

<form action="{{ route('formCompletarTarea') }}" method="post" class="row g-3 needs-validation" id="formulario" enctype="multipart/form-data">
    @csrf

    <div class="col-md-3">
        <label for="anotaciones_anteriores" class="form-label">Anotaciones anteriores: </label>
        <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores" cols="30" rows="4">{{ old('anotaciones_anteriores') }}</textarea>
        {!! $errors->first('anotaciones_anteriores', '<b style="color: red">:message</b>') !!}
    </div>
    <div class="col-md-3">
        <label for="anotaciones_posteriores" class="form-label">Anotaciones posteriores: </label>
        <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores" cols="30" rows="4">{{ old('anotaciones_posteriores') }}</textarea>
        {!! $errors->first('anotaciones_posteriores', '<b style="color: red">:message</b>') !!}
    </div>
    <div class="form-group">
        <label for="fichero" class="form-label">Subir archivo</label>
        <input class="form-control" type="file" name="fichero"><br><br>
    </div>

    <div id="boton" class="col-md-12">
        <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
    </div>

</form>

@endsection
