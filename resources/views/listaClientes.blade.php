@section('titulo', 'Lista Clientes')

@extends('base')

<style>
    #paginacion {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #cuerpo {
        margin: 2em;
    } 
</style>

<div class="cabecera">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>

@section('contenido')

    <h3>Lista clientes</h3>

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
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nombre_apellidos }}</td>
                            <td>{{ $cliente->cif }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->iban }}</td>
                            <td>{{ $cliente->cuota }}</td>
                            <td>{{ $cliente->pais }}</td>
                            <td>{{ $cliente->moneda }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('confirmarBorrarCliente', $cliente) }}" title="Borrar"><i class="fa-solid fa-trash"></i></a>
                                <!--<a class="btn btn-warning" href="#" title="Editar"><i class="fa-solid fa-pen"></i></a>-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $clientes->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $clientes->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}"><<</a>
                    </li>
                    @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                        <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $clientes->currentPage() == $clientes->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->nextPageUrl() }}">>></a>
                    </li>
                    <li class="page-item {{ $clientes->currentPage() == $clientes->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->url($clientes->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
