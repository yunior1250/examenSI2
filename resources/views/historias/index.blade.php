@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Historial Medico</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('historias.create') }}">Registrar Historico Medico</a>

    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="historias">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Paciente</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historias as $historia)
                <tr>
                    <td>{{$historia->id}}</td>
                    <td>{{$historia->fechanaci}}</td>

                    @foreach ($pacientes as $paciente)
                        @if($historia->id_paciente == $paciente->id)
                        <td>{{$paciente->nombre}}</td>
                        @endif
                    @endforeach

                        <td>
                            <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                href="{{ route('historias.edit', $historia) }}"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <form action="{{ route('historias.destroy', $historia) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                    onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i
                                        class="fas fa-trash"></i> Eliminar</button>

                            </form>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#historias').DataTable({
            autoWidth: false
        });
    </script>
@endsection
