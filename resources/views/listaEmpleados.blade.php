@section('titulo', 'Lista Empleados')

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

@section('mensaje')
    <div class="cabecera">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
@endsection

@section('contenido')

    <h3>Lista empleados</h3>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">Fecha alta</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Es admin</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->dni }}</td>
                            <td>{{ $empleado->nombre_apellidos }}</td>
                            <td>{{ date('d-m-Y', strtotime($empleado->fecha_alta)) }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->direccion }}</td>
                            <td>
                                @if ($empleado->es_admin == 1)
                                    👨🏻‍💼
                                @else
                                    👷🏻‍♂️
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('confirmarBorrarEmpleado', $empleado) }}" title="Borrar"><i class="fa-solid fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('formEditarEmpleado', $empleado) }}" title="Editar"><i class="fa-solid fa-pen"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->previousPageUrl() }}"><<</a>
                    </li>
                    @for ($i = 1; $i <= $empleados->lastPage(); $i++)
                        <li class="page-item {{ $empleados->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $empleados->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->nextPageUrl() }}">>></a>
                    </li>
                    <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->url($empleados->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
