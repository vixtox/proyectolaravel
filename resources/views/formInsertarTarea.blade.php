    @extends('base')

    @section('contenido')

    <div class="cabecera">
        <h3>Formulario insertar tarea</h3>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>
         
            <form method="post" action="{{ route('insertarTarea') }}" id="formulario" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="cliente" class="form-label">Clientes:</label>
                    <select class="form-select" name="cliente">
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->cif }}">{{ $cliente->nombre_apellidos }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Nombre y apellidos</label>
                    <input class="form-control" type="text" name="nombre_apellidos"
                        value="{{ old('nombre_apellidos') }}">
                    {!! $errors->first('nombre_apellidos', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Teléfono</label>
                    <input class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
                    {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="2" cols="50">{{ old('descripcion') }}</textarea>
                    {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Correo electrónico</label>
                    <input class="form-control" type="text" name="correo" value="{{ old('correo') }}">
                    {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Dirección</label>
                    <input class="form-control" type="text" name="direccion" value="{{ old('direccion') }}">
                    {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Población</label>
                    <input class="form-control" type="text" name="poblacion" value="{{ old('poblacion') }}">
                    {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Código postal</label>
                    <input class="form-control" type="text" name="codigo_postal" value="{{ old('codigo_postal') }}">
                    {!! $errors->first('codigo_postal', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div class="col-md-6">
                    <label for="provincia" class="form-label">Provincias:</label>
                    <select class="form-select" name="provincia">
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia->cod }}">{{ $provincia->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Selecciona estado</label>
                    <select class="form-select" name="estado" id="estado">
                        <option value="B">B (Esperando ser aprobada)</option>
                        <option value="P">P (Pendiente)</option>
                        <option value="R">R (Realizada)</option>
                        <option value="C">C (Cancelada)</option>
                    </select>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="operario_encargado" class="form-label">Operario encargado:</label>
                    <select class="form-select" name="operario_encargado">
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->dni }}">{{ $empleado->nombre_apellidos }}</option>
      
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha de realización</label>
                    <input class="form-control" type="date" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}">
                    {!! $errors->first('fecha_realizacion', '<span style="color: red;">:message</span>') !!}
                </div>
                <br>
                <div id="boton" class="col-md-12">
                    <button class="btn btn-primary">Enviar tarea</button>
                </div>

            </form><br><br>

    @endsection
