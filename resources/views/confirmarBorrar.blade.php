@section('titulo', 'Confirmar borrar tarea')

@extends('base')

@section('contenido')

    <br>
    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Población</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Fecha de realización</th>
                    </tr>
                </thead>
                <tbody>

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
                        <td>{{ $tarea->fecha_realizacion }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar">
        <a class="btn btn-danger"
            href="{{ route('borrarTarea', ['id' => $tarea->id]) }}">Borrar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
            class="btn btn-success" href="listaTareas">Volver
            atras</a>
    </div>

@endsection
