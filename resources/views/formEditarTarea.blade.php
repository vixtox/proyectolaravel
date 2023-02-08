@extends('base')

@section('contenido')
<div class="cabecera">
    <h3>Formulario editar tarea</h3>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</div>

<form method="post" action="{{ route('editarTarea', $tarea) }}" id="formulario" class="row g-3">
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
        <label for="" class="form-label"><b>Nombre y apellidos</b></label>
        <input class="form-control" type="text" name="nombre_apellidos"
            value="{{ old('nombre_apellidos') ?? $tarea->nombre_apellidos }}">
        {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Teléfono</b></label>
        <input class="form-control" type="text" name="telefono" value="{{ old('telefono') ?? $tarea->telefono }}">
        {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Descripción</b></label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="2"
            cols="50">{{ old('descripcion') ?? $tarea->descripcion }}</textarea>
        {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Correo</b></label>
        <input class="form-control" type="text" name="correo" value="{{ old('correo') ?? $tarea->correo }}">
        {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Dirección</b></label>
        <input class="form-control" type="text" name="direccion" value="{{ old('direccion') ?? $tarea->direccion }}">
        {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Población</b></label>
        <input class="form-control" type="text" name="poblacion" value="{{ old('poblacion') ?? $tarea->poblacion }}">
        {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Código postal</b></label>
        <input class="form-control" type="text" name="codigo_postal"
            value="{{ old('codigo_postal') ?? $tarea->codigo_postal }}">
        {!! $errors->first('codigo_postal', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="provincias_id" class="form-label"><b>Provincias</b></label>
        <select class="form-select" name="provincias_id">
            @foreach ($provincias as $provincia)
            <option value="{{ $provincia->id }}" {{ old('provincias_id')==$provincia->id || (old('provincias_id') == null &&
                $tarea->provincias_id == $provincia->id) ? 'selected' : '' }}>
                {{ $provincia->nombre }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Selecciona estado</b></label>
        <select class="form-select" name="estado" id="estado">
            <option value="P" {{ old('estado')=='P' || (old('estado')==null && $tarea->estado == 'P') ? 'selected' : ''
                }}>
                P=Pendiente</option>
            <option value="R" {{ old('estado')=='R' || (old('estado')==null && $tarea->estado == 'R') ? 'selected' : ''
                }}>
                R=Realizada</option>
            <option value="C" {{ old('estado')=='C' || (old('estado')==null && $tarea->estado == 'C') ? 'selected' : ''
                }}>
                C=Cancelada</option>
        </select>
    </div>
    <br>
    <div class="col-md-6">
        <label for="empleados_id" class="form-label"><b>Operario encargado</b></label>
        <select class="form-select" name="empleados_id">
            @foreach ($empleados as $empleado)
            @if ($empleado->es_admin == 0)
            <option value="{{ $empleado->id }}" {{ old('empleados_id')==$empleado->id || (old('empleados_id') == null &&
                $tarea->empleados_id == $empleado->id) ? 'selected' : '' }}>
                {{ $empleado->nombre_apellidos }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <br>

    <div class="col-md-6">
        <label for="" class="form-label"><b>Fecha de creación</b></label>
        <span type="text" name="fecha_creacion" class="form-control" id="fecha_creacion" placeholder="fecha_creacion">{{
            date('d-m-Y', strtotime($tarea->fecha_creacion)) }}</span>
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Fecha de realización</b></label>
        <input class="form-control" type="date" name="fecha_realizacion"
            value="{{ old('fecha_realizacion') ?? $tarea->fecha_realizacion }}">
        {!! $errors->first('fecha_realizacion', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Anotaciones Anteriores</b></label>
        <textarea class="form-control" id="anotaciones_anteriores" name="anotaciones_anteriores" rows="2"
            cols="50">{{ old('anotaciones_anteriores') ?? $tarea->anotaciones_anteriores }}</textarea>
        {!! $errors->first('anotaciones_anteriores', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>
    <div class="col-md-6">
        <label for="" class="form-label"><b>Anotaciones posteriores</b></label>
        <textarea class="form-control" id="anotaciones_posteriores" name="anotaciones_posteriores" rows="2"
            cols="50">{{ old('anotaciones_posteriores') ?? $tarea->anotaciones_posteriores }}</textarea>
        {!! $errors->first('anotaciones_posteriores', '<span style="color: red;">:message</span>') !!}
    </div>
    <br>

    <div id="boton" class="col-md-12">
        <button class="btn btn-primary">Enviar tarea</button>
        <a class="btn btn-success" href="{{ route('listaTareas') }}">Volver</a>
    </div>

</form><br><br>
@endsection