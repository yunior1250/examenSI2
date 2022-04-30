@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('pacientes.create')}}" class="btn btn-primary btb-sm">Añadir Paciente</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="pacientes" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Opciones</th>


                    </tr>
                </thead>





                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{$paciente->id}}</td>
                            <td>{{$paciente->ci}}</td>
                            <td>{{$paciente->nombre}}</td>
                            <td>{{$paciente->edad}}</td>
                            <td>{{$paciente->telefono}}</td>
                            <td>{{$paciente->direccion}}</td>
                           

                            <td>
                                <form action="{{route('pacientes.destroy', $paciente)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('pacientes.edit', $paciente)}}" class="btn btn-primary btn-sm">Editar<a>
                                    @can('editar paciente')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
                                    @can('eliminar paciente')
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#pacientes').DataTable();
        } );
    </script>
@stop
