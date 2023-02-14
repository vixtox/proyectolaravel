@extends('base')

@section('contenido')
    <div class="cabecera">
        <h3>Formulario editar cliente</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <form method="post" action="{{ route('editarCliente', $cliente) }}" id="formulario" class="row g-3">
        @csrf
    
        <div class="col-md-6">
            <label for="" class="form-label"><b>Nombre y apellidos</b></label>
            <input class="form-control" type="text" name="nombre_apellidos"
                value="{{ old('nombre_apellidos') ?? $cliente->nombre_apellidos }}">
            {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-6">
            <label for="" class="form-label"><b>CIF</b></label>
            <input class="form-control" type="text" name="cif"
                value="{{ old('cif') ?? $cliente->cif }}">
            {!! $errors->first('cif', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Correo</b></label>
            <input class="form-control" type="text" name="correo" value="{{ old('correo') ?? $cliente->correo }}">
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Teléfono</b></label>
            <input class="form-control" type="text" name="telefono" value="{{ old('telefono') ?? $cliente->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>IBAN</b></label>
            <input class="form-control" type="text" name="iban" value="{{ old('iban') ?? $cliente->iban }}">
            {!! $errors->first('iban', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="" class="form-label"><b>Cuota</b></label>
            <input class="form-control" type="text" name="cuota" value="{{ old('cuota') ?? $cliente->cuota }}">
            {!! $errors->first('cuota', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-6">
            <label for="paises_id" class="form-label"><b>Países</b></label>
            <select class="form-select" name="paises_id">
                @foreach ($paises as $pais)
                <option value="{{ $pais->iso3 }}" {{ old('paises_id')==$pais->iso3 || (old('paises_id') == null &&
                    $tarea->paises_id == $pais->iso3) ? 'selected' : '' }}>
                    {{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>
        <br>
        {{-- <div class="col-md-6">
            <label for="paises_id" class="form-label"><b>Monedas</b></label>
            <select class="form-select" name="paises_id">
                @foreach ($paises as $pais)
                <option value="{{ $pais->iso3 }}" {{ old('paises_id')==$pais->iso3 || (old('paises_id') == null &&
                    $tarea->paises_id == $pais->iso3) ? 'selected' : '' }}>
                    {{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>
        <br> --}}

        <div id="boton" class="col-md-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-success" href="{{ route('listaEmpleados') }}">Volver</a>
        </div>

    </div>

    </form><br><br>
@endsection
