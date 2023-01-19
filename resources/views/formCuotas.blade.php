@extends('base')

@section('titulo', 'Formulario registro cuotas')

@section('contenido')

    <form method="POST" action="{{ route('registroCuotas') }}">
        @csrf

        <h1>Formulario insertar cuota</h1>
        <div class="col-md-3">
            <label class="form-label">Concepto</label>
            <input class="form-control" type="text" name="concepto" value="{{ old('concepto') }}">
            {!! $errors->first('concepto', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-3">
            <label class="form-label">Fecha emisión</label>
            <input class="form-control" type="text" name="fecha_emision" value="{{ old('fecha_emision') }}">
            {!! $errors->first('fecha_emision', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-3">
            <label class="form-label">Importe</label>
            <input class="form-control" type="text" name="importe" value="{{ old('importe') }}">
            {!! $errors->first('importe', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-3">
            <label>Pagada</label><br>
            <label>Sí</label>
            <input type="radio" name="pagada" value="si" {{ old('pagada') == 'si' ? 'checked' : '' }}>
            <label>No</label>
            <input type="radio" name="pagada" value="no" {{ old('pagada') == 'no' ? 'checked' : '' }}>
            {!! $errors->first('pagada', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-3">
            <label class="form-label">Notas</label>
            <input class="form-control" type="text" name="notas" value="{{ old('notas') }}">
            {!! $errors->first('notas', '<span style="color: red;">:message</span>') !!}<br>
        </div>
        <div class="col-md-3">
            <label class="form-label">Fecha pago</label>
            <input class="form-control" type="text" name="fecha_pago" value="{{ old('fecha_pago') }}">
            {!! $errors->first('fecha_pago', '<span style="color: red;">:message</span>') !!}<br>
        </div>

        <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
    </form>

@endsection
