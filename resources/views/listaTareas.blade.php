@section('titulo', 'Lista Tareas')

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

    <h3>Lista tareas</h3>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Población</th>
                        <th scope="col">Código postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Fecha de realización</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->cliente }}</td>
                            <td>{{ $tarea->nombre_apellidos }}</td>
                            <td>{{ $tarea->telefono }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->direccion }}</td>
                            <td>{{ $tarea->poblacion }}</td>
                            <td>{{ $tarea->codigo_postal }}</td>
                            <td>{{ $tarea->provincia }}</td>
                            <td>{{ $tarea->operario_encargado }}</td>
                            <td>{{ date('d-m-Y', strtotime($tarea->fecha_realizacion)) }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('confirmarBorrar', $tarea) }}">Borrar</a>
                                &nbsp;&nbsp;
                                <a class="btn btn-warning" href="#">Modificar</a>
                                <a class="btn btn-primary" href="{{ route('detallesTarea', $tarea) }}">Ver detalles</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->previousPageUrl() }}"><<</a>
                    </li>
                    @for ($i = 1; $i <= $tareas->lastPage(); $i++)
                        <li class="page-item {{ $tareas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tareas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->nextPageUrl() }}">>></a>
                    </li>
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->url($tareas->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
