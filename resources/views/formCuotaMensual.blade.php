@extends('base')

@section('titulo', 'Formulario registro cuota mensual')

@section('contenido')

<div class="cabecera">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h3>Formulario registro cuota mensual</h3>
</div>

<form action="{{ route('registroCuotaMensual') }}" method="post" class="row g-3 needs-validation" id="formulario">
    @csrf

    <div class="col-md-6">
        <label for="concepto" class="form-label">Concepto: </label>
        <input class="form-control" type="text" name="concepto" value="{{ old('concepto') }}" placeholder="CONCEPTO">
        {!! $errors->first('concepto', '<b style="color: red">:message</b>') !!}
    </div>

    <div class="col-md-6">
        <label for="fecha_emision" class="form-label">Fecha de emisión: </label>
        <input class="form-control" type="date" name="fecha_emision" value="{{ old('fecha_emision') }}">
        {!! $errors->first('fecha_emision', '<b style="color: red">:message</b>') !!}
    </div>

    <div class="col-md-6">
        <label for="notas" class="form-label">Notas: </label>
        <textarea class="form-control" name="notas" id="notas" cols="30" rows="4">{{ old('notas') }}</textarea>
        {!! $errors->first('notas', '<b style="color: red">:message</b>') !!}
    </div>

    <div id="boton" class="col-md-12">
        <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
    </div>

</form>

@endsection
