@section('titulo', 'Confirmar borrar tarea')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Detalles de la tarea</h3>
    </div>

    <table class="table table-bordered">
        <tr>
            <thead class="table-dark">
                <th>Nombre campo</th>
                <th>Valor campo</th>
            </thead>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>
                @if ($tarea->cliente)
                    {{ $tarea->cliente->cif }}
                @else
                    Cliente dado de baja
                @endif
            </td>
        </tr>
        <tr>
            <th>Persona contacto</th>
            <td>{{ $tarea->nombre_apellidos }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $tarea->telefono }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $tarea->descripcion }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $tarea->direccion }}</td>
        </tr>
        <tr>
            <th>Población</th>
            <td>{{ $tarea->poblacion }}</td>
        </tr>
        <tr>
            <th>Código postal</th>
            <td>{{ $tarea->codigo_postal }}</td>
        </tr>
        <tr>
            <th>Provincias</th>
            <td>{{ $tarea->provincia->nombre }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $tarea->estado }}</td>
        </tr>
        <tr>
            <th>Operario encargado</th>
            <td>
                @if ($tarea->empleado)
                    {{ $tarea->empleado->nombre_apellidos }}
                @else
                    Operario dado de baja
                @endif
            </td>
        </tr>
        <tr>
            <th>Fecha de creación</th>
            <td>{{ date('d-m-Y', strtotime($tarea->fecha_creacion)) }}</td>
        </tr>
        <tr>
            <th>Fecha de realizacion</th>
            <td>{{ date('d-m-Y', strtotime($tarea->fecha_realizacion)) }}</td>
        </tr>
        <tr>
            <th>Anotaciones anteriores</th>
            <td>{{ $tarea->anotaciones_anteriores }}</td>
        </tr>
        <tr>
            <th>Anotaciones posteriores</th>
            <td>{{ $tarea->anotaciones_posteriores }}</td>
        </tr>
        <tr>
            <th>Fichero</th>
            <td>
                @if ($tarea->fichero)
                    <a class="btn btn-info"
                        href="{{ Storage::url('public/files/' . $tarea->fichero) }}"download="{{ basename($tarea->fichero) }}">{{ $tarea->fichero }}</a>
                @endif
            </td>
        </tr>
    </table>

    <div id="centrar" class="d-flex justify-content-center"><a class="btn btn-success"
            href="{{ route('listaTareas') }}">Volver</a>
    </div>

@endsection
