@section('titulo', 'Confirmar borrar tarea')

@extends('base')

@section('contenido')

<div class="cabecera">
    <h3>Confirme para borrar la siguiente tarea</h3>
</div>

    <div id="cuerpo">
        <div class="table-responsive">
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
        
            </table>
        </div>

    </div>

    <div id="centrar"  class="d-flex justify-content-center">
        <form action="{{ route('borrarTarea', $tarea) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaTareas') }}">Volver atras</a>
        </form>
    </div>

@endsection
