@extends('base')

@section('titulo', 'Formulario registro cuota')

@section('contenido')

<div class="cabecera">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h3>Formulario registro cuota</h3>
</div>

    <form method="post" action="{{ route('registroCuotas') }}" class="row g-3" id="formulario">
        @csrf

        <div class="col-md-6">
            <label for="clientes_id" class="form-label"><b>Clientes</b></label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('clientes_id')==$cliente->id ? 'selected' : '' }}>{{ $cliente->nombre_apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Concepto</b></label>
            <input class="form-control" type="text" name="concepto" value="{{ old('concepto') }}">
            {!! $errors->first('concepto', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Fecha emisión</b></label>
            <input class="form-control" type="date" name="fecha_emision" value="{{ old('fecha_emision') }}">
            {!! $errors->first('fecha_emision', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Importe</b></label>
            <input class="form-control" type="text" name="importe" value="{{ old('importe') }}">
            {!! $errors->first('importe', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Notas</b></label>
            <input class="form-control" type="text" name="notas" value="{{ old('notas') }}">
            {!! $errors->first('notas', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label><b>Pagada</b></label><br>
            <label>Sí</label>
            <input type="radio" name="pagada" value="SI" {{ old('pagada') == 'SI' ? 'checked' : '' }}>
            <label>No</label>
            <input type="radio" name="pagada" value="NO" {{ old('pagada') == 'NO' ? 'checked' : '' }}>
            {!! $errors->first('pagada', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Fecha pago</b></label>
            <input class="form-control" type="date" name="fecha_pago" value="{{ old('fecha_pago') }}">
            {!! $errors->first('fecha_pago', '<span style="color: red;">:message</span>') !!}
        </div>

        <div id="boton" class="col-md-12">
            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </div>
    </form>

@endsection
