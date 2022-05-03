@extends('adminlte::page')

@section('title', 'Clinica Garcia')

@section('content_header')
    <h1>Registrar Consulta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('consulta.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">

                        <label for="descripcion">Ingresar Descripcion</label>
                        <input type="text" name="descripcion" class="form-control"  value=""  required>

                        <label for="fecha">Ingresar Fecha</label>
                        <input type="date" name="fecha" class="form-control"  value=""  required>

                        <label for="hora">Ingresar Hora</label>
                        <input type="time" name="hora" class="form-control"  value=""  required>

                        <div class="form-group">
                            <label for="estado">Ingresar Medico</label>
                            <select name="id_medico"  class="focus border-primary  form-control">
                                @foreach($medicos as $medico)
                                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Ingresar Paciente</label>
                            <select name="id_paciente"  class="focus border-primary  form-control">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Medico</button>
                    <a class="btn btn-danger" href="{{route('consulta.index')}}">Volver</a>
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
