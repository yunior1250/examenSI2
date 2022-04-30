@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Registrar Pacientes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> medico ya registrado.
      </div>

        @enderror
            <form action="{{route('pacientes.update', $paciente)}}" method="post" >
                @csrf
                @method('put')
                <div class="form-row">
                     <div class="form-group col-md-6">

                        <label for="ci">Ingresar CI</label>
                        <input type="text" name="ci" class="form-control"  value="{{$paciente->ci}}"  required>

                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control"  value="{{$paciente->nombre}}"  required>

                        <label for="edad">Ingresar Edad</label>
                        <input type="text" name="edad" class="form-control"  value="{{$paciente->edad}}"  required>

                        <label for="telefono">Ingresar Telefono</label>
                        <input type="number" name="telefono" class="form-control"  value="{{$paciente->telefono}}"  required>

                        <label for="direccion">Ingresar Telefono</label>
                        <input type="number" name="direccion" class="form-control"  value="{{$paciente->direccion}}"  required>

                    </div>

                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Actualizar Paciente</button>
                    <a class="btn btn-danger" href="{{route('medicos.index')}}">Volver</a>
                </div>

            </form>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
