@section('titulo', 'Confirmar borrar cliente')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar el siguiente cliente</h3>
    </div>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <thead class="table-dark">
                            <th>Nombre campo</th>
                            <th>Valor campo</th>
                        </thead>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nombre y apellidos</th>
                        <td>{{ $cliente->nombre_apellidos }}</td>
                    </tr>
                    <tr>
                        <th>CIF</th>
                        <td>{{ $cliente->cif }}</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>{{ $cliente->correo }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <th>IBAN</th>
                        <td>{{ $cliente->iban }}</td>
                    </tr>
                    <tr>
                        <th>Cuota</th>
                        <td>{{ $cliente->cuota }}</td>
                    </tr>
                    <tr>
                        <th>País</th>
                        <td>{{ $cliente->pais->iso3 }}</td>
                    </tr>
                    <tr>
                        <th>Moneda</th>
                        <td>{{ $cliente->moneda }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar"  class="d-flex justify-content-center">
        <form action="{{ route('borrarCliente', $cliente) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaClientes') }}">Volver atras</a>
        </form>
    </div>

@endsection
