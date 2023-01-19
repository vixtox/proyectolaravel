@section('titulo', 'Confirmar borrar tarea')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Detalles de la tarea</h3>
    </div>

    <!--<div id="cuerpo">
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
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>-->


    <table class="table table-bordered">
        <tr>
            <thead class="table-dark">
                <th>Nombre campo</th>
                <th>Valor campo</th>
            </thead>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $tarea->cliente }}</td>
        </tr>
        <tr>
            <th>Nombre y Apellidos</th>
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
            <th>Código Postal</th>
            <td>{{ $tarea->codigo_postal }}</td>
        </tr>
        <tr>
            <th>Provincias</th>
            <td>{{ $tarea->provincia }}</td>
        </tr>
        <tr>
            <th>Operario Encargado</th>
            <td>{{ $tarea->operario_encargado }}</td>
        </tr>
        <tr>
            <th>Fecha de Realizacion</th>
            <td>{{ date('d-m-Y', strtotime($tarea->fecha_realizacion)) }}</td>
        </tr>
        <tr>
            <th>Anotaciones anteriores</th>
            <td></td>
        </tr>
        <tr>
            <th>Anotaciones posteriores</th>
            <td></td>
        </tr>

    </table>


    <div id="centrar"><a class="btn btn-success" href="{{ route('listaTareas') }}">Volver
            atras</a>
    </div>

@endsection
