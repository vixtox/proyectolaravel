@section('titulo', 'Confirmar borrar cliente')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar el siguiente cliente</h3>
    </div>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">CIF</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Iban</th>
                        <th scope="col">Cuota</th>
                        <th scope="col">País</th>
                        <th scope="col">Moneda</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $cliente->nombre_apellidos }}</td>
                        <td>{{ $cliente->cif }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->iban }}</td>
                        <td>{{ $cliente->cuota }}</td>
                        <td>{{ $cliente->pais->iso3 }}</td>
                        <td>{{ $cliente->moneda }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar">
        <form action="{{ route('borrarCliente', $cliente) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaClientes') }}">Volver atras</a>
        </form> 
    </div>

@endsection
