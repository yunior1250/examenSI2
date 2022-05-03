@extends('adminlte::page')

@section('title', 'Consulta Garcia')

@section('content_header')
    <h1>Editar Consultas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('consulta.update', $consulta->id)}}" method="post" >
                @csrf
                @method('PATCH')
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="fecha">Ingresar Descripcion</label>
                        <input type="text" name="descripcion" class="form-control"  value="{{$consulta->fecha}}"  required>

                        <label for="fecha">Ingresar Fecha</label>
                        <input type="date" name="fecha" class="form-control"  value="{{$consulta->fecha}}"  required>

                        <label for="hora">Ingresar Hora</label>
                        <input type="time" name="hora" class="form-control"  value="{{$consulta->hora}}"  required>

                        <div class="form-group">
                            <label for="estado">Ingresar Medico</label>
                            <select name="id_medico"  class="focus border-primary  form-control">
                                @foreach($medicos as $medico)
                                @if($consulta->id_medico == $medico->id)
                                <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                @endif
                                @endforeach
                                @foreach($medicos as $medico)
                                @if (!($consulta->id_medico == $medico->id))
                                <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                @endif
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
                    <button  class="btn btn-primary" type="submit" value="required">Actualizar Consulta</button>
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
