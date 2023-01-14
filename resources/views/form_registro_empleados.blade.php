@extends('base')

@section('titulo', 'NOSECAEN')

@section('contenido')

    <form method="POST" action="{{ route('registroEmpleado') }}" >
        @csrf
 
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
        {{ $errors->first('nombre') }}<br>
        <label>DNI</label>
        <input type="text" name="dni" value="{{ old('dni') }}"><br>
        {{ $errors->first('dni') }}<br>
        <label>Correo</label>
        <input type="text" name="correo" value="{{ old('correo') }}"><br>
        {{ $errors->first('correo') }}<br>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}"><br>
        {{ $errors->first('telefono') }}<br>
        <label>Dirección</label>
        <input type="text" name="direccion" value="{{ old('direccion') }}"><br>
        {{ $errors->first('direccion') }}<br>
        <label>Tipo</label>
        <label>Admin</label>
        <input type="radio" name="tipo" value="admin" {{ old('tipo') == 'admin' ? 'checked' : '' }}>
        <label>Operario</label>
        <input type="radio" name="tipo" value="operario" {{ old('tipo') == 'operario' ? 'checked' : '' }}>
        {{ $errors->first('tipo') }}<br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
    
@endsection