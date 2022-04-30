@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Medicos</h1>
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
            <form action="{{route('medicos.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">



                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control"  value="" id="nombre" required>

                        <label for="telefono">Ingresar Telefono</label>
                        <input type="number" name="telefono" class="form-control"  value="" id="telefono" required>

                        <label for="edad">Ingresar Edad</label>
                        <input type="number" name="edad" class="form-control"  value="" id="telefono" required>

                        <label for="direccion">Ingresar Direccion</label>
                        <input type="text" name="direccion" class="form-control"  value="" id="telefono" required>


                        <div>
                            <label for="especialidad">Seleccione una Especialidad</label>
                            <select name="especialidad" id="select-roles" class="form-control" onchange="habilitar()" >
                                    @foreach ( $esps as $esp )
                                    <option value="{{$esp->id}}">{{$esp->nombre}}</option>
                                    @endforeach



                            </select>
                        </div>

                        <label for="email">ingresar Email</label>
                        <input type="text" name="email" class="form-control"  value="{{old('email')}}" id="email" required>

                        <label for="password">Ingresar Contraseña</label>
                        <input type="text" name="password" class="form-control"  value="{{old('password')}}" id="password" required>




                    </div>







                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir medico</button>
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
