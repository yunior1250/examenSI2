@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Especialidades</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('esps.create')}}" class="btn btn-primary btb-sm">Crear Especialida</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Descripcion</th>

                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>


                    @foreach ($esps as $esp)

                        <tr>
                            <td>{{$esp->id}}</td>
                            <td>{{$esp->nombre}}</td>
                            <td>{{$esp->descripcion}}</td>

                            <td>
                                <form action="{{route('esps.destroy', $esp)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('esps.edit', $esp)}}" class="btn btn-primary btn-sm">Editar<a>
                                    @can('editar usuario')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button>
                                    @can('eliminar usuario')
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
        $('#usuarios').DataTable();
        } );
    </script>
@stop
