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
                        <th scope="col">Persona contacto</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Fecha de realización</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>
                                @if ($tarea->cliente)
                                    {{ $tarea->cliente->cif }}
                                @else
                                    Cliente dado de baja
                                @endif
                            </td>
                            <td>{{ $tarea->nombre_apellidos }}</td>
                            <td>{{ $tarea->telefono }}</td>
                            <td>{{ $tarea->provincia->nombre }}</td>
                            <td>{{ $tarea->estado }}</td>
                            <td>
                                @if ($tarea->empleado)
                                    {{ $tarea->empleado->nombre_apellidos }}
                                @else
                                    Operario dado de baja
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($tarea->fecha_realizacion)) }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('confirmarBorrarTarea', $tarea) }}" title="Borrar"><i class="fa-solid fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('formEditarTarea', $tarea) }}" title="Editar"><i class="fa-solid fa-pen"></i></a>
                                <a class="btn btn-primary" href="{{ route('detallesTarea', $tarea) }}" title="Detalles"><i class="fa-solid fa-eye"></i></a>
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
