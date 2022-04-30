@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Registrar Especialida</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('name')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Este usuario ya está registrado.
      </div>

        @enderror
            <form action="{{route('esps.update', $esp)}}" method="post" >
                @csrf
                @method('put')
                <label for="name">Ingrese el nombre de Especialidad</label>
                <input type="text" name="nombre" class="form-control" value="{{$esp->nombre}}"  required>

                <br>
                <label for="email">Ingrese la descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$esp->descripcion}}" required>




                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar </button>
                <a class="btn btn-primary btn-sm" href="{{route('esps.index')}}">Volver</a>
            </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', cargar, false);
    var rol = document.getElementById('select-roles');
    var empleados = document.getElementById('select-empleados');
    function habilitar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    function cargar(){
        if(rol.value > 0){
            empleados.disabled = false
        }else{
            empleados.disabled = true
            empleados.value = 0
        }
    }
    /* function elegirE(){
        if(odontologos.value > 0){
            odontologos.disabled = false
        }
    } */
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
