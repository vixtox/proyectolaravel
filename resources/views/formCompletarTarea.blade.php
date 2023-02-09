@extends('base')

@section('titulo', 'Formulario completar tarea')

@section('contenido')

<div class="cabecera">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h3>Formulario completar tarea</h3>
</div>

<form action="{{ route('completarTarea', $tarea) }}" method="post" class="row g-3 needs-validation" id="formulario" enctype="multipart/form-data">
    @csrf

    <div class="col-md-6">
        <label for="anotaciones_anteriores" class="form-label"><b>Anotaciones anteriores</b></label>
        <textarea class="form-control" id="anotaciones_anteriores" name="anotaciones_anteriores" rows="2"
            cols="50">{{ old('anotaciones_anteriores') ?? $tarea->anotaciones_anteriores }}</textarea>
        {!! $errors->first('anotaciones_anteriores', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <label for="anotaciones_posteriores" class="form-label"><b>Anotaciones posteriores</b></label>
        <textarea class="form-control" id="anotaciones_posteriores" name="anotaciones_posteriores" rows="2"
            cols="50">{{ old('anotaciones_posteriores') ?? $tarea->anotaciones_posteriores }}</textarea>
        {!! $errors->first('anotaciones_posteriores', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-4">
        <label for="fichero" class="form-label">Fichero Resumen</label>
        <input type="file" name="fichero" class="form-control" id="fichero">
    </div>

    <div id="boton" class="col-md-12">
        <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        <a class="btn btn-success" href="{{ route('listaTareas') }}">Volver</a>
    </div>

</form>

@endsection
