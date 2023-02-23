@section('titulo', 'Confirmar borrar cuota')

@extends('base')

@section('contenido')

    <div class="cabecera">
        <h3>Confirme para borrar la siguiente cuota</h3>
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
                        <th>Cliente</th>
                        <td>
                            @if ($cuota->cliente)
                                {{ $cuota->cliente->cif }}
                            @else
                                Cliente dado de baja
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Concepto</th>
                        <td>{{ $cuota->concepto }}</td>
                    </tr>
                    <tr>
                        <th>Fecha emisión</th>
                        <td>{{ date('d-m-Y', strtotime($cuota->fecha_emision)) }}</td>
                    </tr>
                    <tr>
                        <th>Importe</th>
                        <td>{{ $cuota->importe }}</td>
                    </tr>
                    <tr>
                        <th>Pagada</th>
                        <td>{{ $cuota->pagada }}</td>
                    </tr>
                    <tr>
                        <th>Fecha pago</th>
                        <td>{{ !empty($cuota->fecha_pago) ? date('d-m-Y', strtotime($cuota->fecha_pago)) :' '}}</td>
                    </tr>
                    <tr>
                        <th>Notas</th>
                        <td>{{ $cuota->notas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div id="centrar"  class="d-flex justify-content-center">
        <form action="{{ route('borrarCuota', $cuota) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
            <a class="btn btn-success" href="{{ route('listaCuotas') }}">Volver atras</a>
        </form> 
    </div>

@endsection
