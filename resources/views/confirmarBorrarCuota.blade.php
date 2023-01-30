@section('titulo', 'Confirmar borrar cuota')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar la siguiente cuota</h3>
    </div>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha emisión</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pagada</th>
                        <th scope="col">Fecha pago</th>
                        <th scope="col">Notas</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $cuota->cliente }}</td>
                        <td>{{ $cuota->concepto }}</td>
                        <td>{{ $cuota->fecha_emision }}</td>
                        <td>{{ $cuota->importe }}</td>
                        <td>{{ $cuota->pagada }}</td>
                        <td>{{ $cuota->fecha_pago }}</td>
                        <td>{{ $cuota->notas }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar">
        <form action="{{ route('borrarCuota', $cuota) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaCuotas') }}">Volver atras</a>
        </form> 
    </div>

@endsection
