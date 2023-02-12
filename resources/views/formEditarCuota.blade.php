@extends('base')

@section('contenido')
<div class="cabecera">
    <h3>Formulario editar cuota</h3>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</div>

<form method="post" action="{{ route('editarCuota', $cuota) }}" id="formulario" class="row g-3">
    @csrf

    <div class="col-md-6">
        <label for="clientes_id" class="form-label"><b>Clientes</b></label>
        <select class="form-select" name="clientes_id">
            @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ old('clientes_id')==$cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre_apellidos }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Concepto</b></label>
        <input class="form-control" type="text" name="concepto"
            value="{{ old('concepto') ?? $cuota->concepto }}">
        {!! $errors->first('concepto', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Fecha emisión</b></label>
        <input class="form-control" type="date" name="fecha_emision"
            value="{{ old('fecha_emision') ?? $cuota->fecha_emision }}">
        {!! $errors->first('fecha_emision', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Importe</b></label>
        <input class="form-control" type="text" name="importe" value="{{ old('importe') ?? $cuota->importe }}">
        {!! $errors->first('importe', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Notas</b></label>
        <textarea class="form-control" id="notas" name="notas" rows="2"
            cols="50">{{ old('notas') ?? $cuota->notas }}</textarea>
        {!! $errors->first('notas', '<span style="color: red;">:message</span>') !!}
    </div>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Fecha pago</b></label>
        <input class="form-control" type="date" name="fecha_pago"
            value="{{ old('fecha_pago') ?? $cuota->fecha_pago }}">
        {!! $errors->first('fecha_pago', '<span style="color: red;">:message</span>') !!}
    </div>
    <div>
        <label for="pagada" class="form-label"><b>Pagada</b></label>
        <br>
        <input class="form-check-input" type="radio" name="pagada" value="SI"
            {{ old('pagada', $cuota->pagada) == 'SI' ? 'checked' : '' }}> SÍ
        <br>
        <input class="form-check-input" type="radio" name="pagada" value="NO"
            {{ old('pagada', $cuota->pagada) == 'NO' ? 'checked' : '' }}> NO
    </div>

    <div id="boton" class="col-md-12">
        <button class="btn btn-primary">Enviar cuota</button>
        <a class="btn btn-success" href="{{ route('listaCuotas') }}">Volver</a>
    </div>

</form><br><br>
@endsection