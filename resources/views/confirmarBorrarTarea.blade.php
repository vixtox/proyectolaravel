@section('titulo', 'Confirmar borrar tarea')

@extends('base')

@section('contenido')

<div class="cabecera">
    <h3>Confirme para borrar la siguiente tarea</h3>
</div>

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
                    </tr>
                </thead>
                <tbody>

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
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->direccion }}</td>
                        <td>{{ $tarea->poblacion }}</td>
                        <td>{{ $tarea->codigo_postal }}</td>
                        <td>{{ $tarea->provincia }}</td>
                        <td>
                            @if ($tarea->empleado)
                                {{ $tarea->empleado->dni }}
                            @else
                                Operario dado de baja
                            @endif
                        </td>
                        <td>{{ date('d-m-Y', strtotime($tarea->fecha_realizacion)) }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar">
        <form action="{{ route('borrarTarea', $tarea) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaTareas') }}">Volver atras</a>
        </form>
    </div>

@endsection
