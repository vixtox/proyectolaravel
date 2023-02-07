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


    <form action="{{ route('registroCliente') }}" method="post" class="row g-3" id="formulario">
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
            <label for="paises_id" class="form-label"><b>País</b></label>
            <select class="form-select" name="paises_id">
                @foreach ($paises as $pais)
                  <option value="{{ $pais->id }}" {{ old('paises_id') == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                @endforeach
              </select>
        </div>

        <div class="col-md-6">
            <label for="moneda" class="form-label"><b>Moneda</b></label>
            <select class="form-select" name="moneda">
                <?php $monedasMostradas = []; ?>
                @foreach ($paises as $pais)
                    @if ($pais->iso_moneda == null)
                    @else
                        @if (!in_array($pais->iso_moneda, $monedasMostradas))
                            <?php array_push($monedasMostradas, $pais->iso_moneda); ?>
                            <option value="{{ $pais->iso_moneda }}"
                                {{ old('moneda') == $pais->iso_moneda ? 'selected' : '' }}>{{ $pais->nombre_moneda }}
                            </option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>

        <div id="boton" class="col-md-12">
            <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
        </div>
    </form>

@endsection
