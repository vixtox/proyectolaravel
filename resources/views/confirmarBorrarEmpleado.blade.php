@section('titulo', 'Confirmar borrar empleado')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar el siguiente empleado</h3>
    </div>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <thead class="table-dark">
                            <th>Nombre campo</th>
                            <th>Valor campo</th>
                        </thead>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>DNI</th>
                        <td>{{ $empleado->dni }}</td>
                    </tr>
                    <tr>
                        <th>Nombre y Apellidos</th>
                        <td>{{ $empleado->nombre_apellidos }}</td>
                    </tr>
                    <tr>
                        <th>Clave</th>
                        <td>{{ $empleado->clave }}</td>
                    </tr>
                    <tr>
                        <th>Fecha alta</th>
                        <td>{{ date('d-m-Y', strtotime($empleado->fecha_alta)) }}</td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td>{{ $empleado->correo }}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{ $empleado->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td>{{ $empleado->direccion }}</td>
                    </tr>
                    <tr>
                        <th>Es admin</th>
                        <td>{{ $empleado->es_admin }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar"  class="d-flex justify-content-center">
        <form action="{{ route('borrarEmpleado', $empleado) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaEmpleados') }}">Volver atras</a>
        </form>
    </div>

@endsection
