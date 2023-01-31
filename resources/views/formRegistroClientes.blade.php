@extends('base')

@section('titulo', 'Formulario registro cliente')

@section('contenido')


<div class="cabecera">
    <h3>Formulario registro cliente</h3>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
   

    <form action="{{ route('registroCliente') }}"  method="post" class="row g-3" id="formulario">
        @csrf

        <div class="col-md-6">
            <label class="form-label"><b>Nombre y apellidos</b></label>
            <input class="form-control" type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos') }}">
            {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>CIF</b></label>
            <input class="form-control" type="text" name="cif" value="{{ old('cif') }}">
            {!! $errors->first('cif', '<span style="color: red;">:message</span>') !!}
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
            <label class="form-label" for="telefono"><b>Teléfono</b></label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label"><b>Iban</b></label>
            <input class="form-control" type="text" name="iban" value="{{ old('iban') }}">
            {!! $errors->first('iban', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label for="paises" class="form-label"><b>Cuota mensual</b></label>
            <input class="form-control" type="text" name="cuota" value="{{ old('cuota') }}">
            {!! $errors->first('cuota', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-6">
            <label for="paises" class="form-label"><b>Países</b></label>
            <select class="form-select" name="pais">
                @foreach ($paises as $pais)
                    <option value="{{ $pais->iso3 }}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="paises" class="form-label"><b>Monedas</b></label>
            <select class="form-select" name="moneda">
                <?php $monedasMostradas = []; ?>
                @foreach ($paises as $pais)
                    @if ($pais->nombre_moneda == null)
                    @else
                        @if (!in_array($pais->nombre_moneda, $monedasMostradas))
                            <?php array_push($monedasMostradas, $pais->nombre_moneda); ?>
                            <option value="{{ $pais->nombre_moneda }}">{{ $pais->nombre_moneda }}</option>
                        @endif
                    @endif
                @endforeach
            </select><br>
        </div>
        <div id="boton" class="col-md-12">
            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </div>
    </form>

@endsection
