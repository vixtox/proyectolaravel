@section('titulo', 'Lista Empleados VUE')

@extends('base')

@section('contenido')

    <div id="registroempleados"></div>

    @vite('resources/js/app.js')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

@endsection