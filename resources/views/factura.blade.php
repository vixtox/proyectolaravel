<!DOCTYPE html>
<html>

<head>
    <title>Factura {{ $cuota->id }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Factura {{ $cuota->id }}</h1>
        <table class="table table-striped mx-auto" style="width: 100%;">
            <tr>
                <th>ID de factura:</th>
                <td>{{ $cuota->id }}</td>
            </tr>
            <tr>
                <th>Cliente:</th>
                <td>{{ $cuota->cliente->nombre_apellidos }}</td>
            </tr>
            <tr>
                <th>CIF:</th>
                <td>{{ $cuota->cliente->cif }}</td>
            </tr>
            <tr>
                <th>Concepto:</th>
                <td>{{ $cuota->concepto }}</td>
            </tr>
            <tr>
                <th>Fecha de emisión:</th>
                <td>{{ date('d-m-Y', strtotime($cuota->fecha_emision)) }}</td>
            </tr>
            @if ($tipo_cambio != '')
            <tr>
                <th>Importe moneda extranjera:</th>
                <td>{{ $cuota->importe }}
                    {{ $cliente->moneda }}</td>
            </tr>
            <tr>
                <th>Fecha de conversion:</th>
                <td>{{ $tipo_cambio['fecha_conversion'] }}</td>
            </tr>
            <tr>
                <th>1 {{ $cliente->moneda }}</th>
                <td>equivale a {{ $tipo_cambio['rate'] }} EUR</td>
            </tr>
            <tr>
                <th>Importe moneda local:</th>
                <td>{{ $tipo_cambio['importe_api'] }} €</td>
            </tr>
            <tr>
                <th>Importe:</th>
                <td>{{ $cuota->importe }}{{ $cliente->moneda }}</td>
            </tr>
            @endif
            @if ($tipo_cambio == '')
            <tr>
                <th>Importe:</th>
                <td>{{ $cuota->importe }}
                    {{ $cliente->moneda }}</td>
            </tr>
            @endif
            <tr>
                <th>Pagada:</th>
                <td>{{ $cuota->pagada ? 'Sí' : 'No' }}</td>
            </tr>
            <tr>
                <th>Fecha de pago:</th>
                <td>{{ date('d-m-Y', strtotime($cuota->fecha_pago)) ?? '-' }}</td>
            </tr>
            <tr>
                <th>Notas:</th>
                <td>{{ $cuota->notas }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
