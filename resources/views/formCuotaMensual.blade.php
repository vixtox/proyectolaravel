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

    <div class="col-md-3">
        <label for="concepto" class="form-label">Concepto: </label>
        <input class="form-control" type="text" name="concepto" value="{{ old('concepto') }}" placeholder="CONCEPTO">
        {!! $errors->first('concepto', '<b style="color: red">:message</b>') !!}
    </div>

    <div class="col-md-3">
        <label for="fecha_emision" class="form-label">Fecha de emisión: </label>
        <input class="form-control" type="date" name="fecha_emision" value="{{ old('fecha_emision') }}">
        {!! $errors->first('fecha_emision', '<b style="color: red">:message</b>') !!}
    </div>

    <div class="col-md-3">
        <label for="notas" class="form-label">Notas: </label>
        <textarea class="form-control" name="notas" id="notas" cols="30" rows="4">{{ old('notas') }}</textarea>
        {!! $errors->first('notas', '<b style="color: red">:message</b>') !!}
    </div>

    <div class="col-15">
        <button type="submit" class="btn btn-primary">Enviar <svg xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg></button>
    </div>

</form>

@endsection
