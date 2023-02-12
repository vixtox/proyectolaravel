@section('titulo', 'Lista Cuotas')

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

    <h3>Lista cuotas</h3>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha emisión</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pagada</th>
                        <th scope="col">Fecha pago</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuotas as $cuota)
                        <tr>
                            <td>
                                @if ($cuota->cliente)
                                    {{ $cuota->cliente->cif }}
                                @else
                                    Cliente dado de baja
                                @endif
                            </td>
                            <td>{{ $cuota->concepto }}</td>
                            <td>{{ $cuota->fecha_emision }}</td>
                            <td>{{ $cuota->importe }}</td>
                            <td>{{ $cuota->pagada }}</td>
                            <td>
                                @if ($cuota->fecha_pago)
                                    {{ date('d-m-Y', strtotime($cuota->fecha_pago)) }}
                                @endif
                            </td>
                            <td>{{ $cuota->notas }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('confirmarBorrarCuota', $cuota) }}" title="Borrar"><i class="fa-solid fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('formEditarCuota', $cuota) }}" title="Editar"><i class="fa-solid fa-pen"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $cuotas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $cuotas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->previousPageUrl() }}"><<</a>
                    </li>
                    @for ($i = 1; $i <= $cuotas->lastPage(); $i++)
                        <li class="page-item {{ $cuotas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $cuotas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $cuotas->currentPage() == $cuotas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->nextPageUrl() }}">>></a>
                    </li>
                    <li class="page-item {{ $cuotas->currentPage() == $cuotas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->url($cuotas->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
