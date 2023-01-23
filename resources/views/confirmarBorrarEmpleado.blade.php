@section('titulo', 'Confirmar borrar empleado')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar el siguiente empleado</h3>
    </div>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Fecha alta</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Es admin</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $empleado->dni }}</td>
                        <td>{{ $empleado->nombre_apellidos }}</td>
                        <td>{{ $empleado->clave }}</td>
                        <td>{{ date('d-m-Y', strtotime($empleado->fecha_alta)) }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ $empleado->es_admin }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar">
        <form action="{{ route('borrarEmpleado', $empleado) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaEmpleados') }}">Volver atras</a>
        </form>
    </div>

@endsection
