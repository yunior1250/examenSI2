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
        <form action="{{route('medicos.update', $historico)}}" method="post">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h2>Creacioncion del historial medico</h2>

                    <label for="nombre">Ingresar Fecha de Nacimento</label>
                    <input type="date" name="fechanaci" class="form-control" value="{{$historico->fechanaci}}" id="nombre" required>

                    <label for="telefono">Ingresar Ocupacion</label>
                    <input type="text" name="ocupacion" class="form-control" value="{{$historico->ocupacion}}" id="telefono" required>

                    <label for="edad">Ingresar Estado civil</label>
                    <input type="text" name="estadocivil" class="form-control" value="{{$historico->ocupacion}}" id="telefono" required>



                    <div class="form-group">
                        <label for="estado">Ingresar Paciente</label>
                        <select name="id_paciente" class="focus border-primary  form-control">
                            @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--
                       <h2>Antecedentes Personales</h2>

                       <label for="direccion">Ingresar Direccion</label>
                       <input type="text" name="direccion" class="form-control"  value="" id="telefono" required>


                       <label for="nombre">Ingresar Nombre</label>
                       <input type="text" name="nombre" class="form-control"  value="" id="nombre" required>

                       <label for="telefono">Ingresar Telefono</label>
                       <input type="number" name="telefono" class="form-control"  value="" id="telefono" required>

                       <label for="edad">Ingresar Edad</label>
                       <input type="number" name="edad" class="form-control"  value="" id="telefono" required>

                       <label for="direccion">Ingresar Direccion</label>
                       <input type="text" name="direccion" class="form-control"  value="" id="telefono" required>
-->


                    <h2>Antecedentes Personales</h2>
                    <div class="form-group">
                        <label for="caridovas">Alchol:</label>
                        <select name="alcohol" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pulmonar">Tabaco:</label>
                        <select name="tabaco" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="digestivo">Droga:</label>
                        <select name="droga" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="renales">Sueño:</label>
                        <select name="sueño" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quirurgico">Sexualidad:</label>
                        <select name="sexualidad" class="focus border-primary  form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alergico">Enfermedades de La Infancia:</label>
                        <select name="enfermedadesinfancia" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="transfusion">Respiratorio :</label>
                        <select name="respiratorio" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transfusion">Traumatologicos :</label>
                        <select name="traumatologico" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transfusion">Quirurgicos :</label>
                        <select name="quirurgicos" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="transfusion">Alergias :</label>
                        <select name="alergicos" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transfusion">Alimentacion Saludable :</label>
                        <select name="alimentacion" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transfusion">Alimentacion Saludable :</label>
                        <select name="infuciones" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>



                    <h2>Antecedentes Familiares</h2>
                    <div class="form-group">
                        <label for="caridovas">Inspeccione General:</label>
                        <input type="text" name="inspecciongeneral" class="form-control" value="{{$antf->inspecciongeneral}}" id="telefono"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="pulmonar">Peso:</label>
                        <input type="text" name="peso" class="form-control" value="{{$antf->peso}}" id="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="digestivo">Altura:</label>
                        <input type="text" name="altura" class="form-control" value="{{$antf->altura}}" id="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="renales">Temperatura:</label>
                        <input type="text" name="temperatura" class="form-control" value="{{$antf->temperatura}}" id="telefono" required>
                    </div>

                    <div class="form-group">
                        <label for="quirurgico">Aspecto:</label>
                        <input type="text" name="aspecto" class="form-control" value="{{$antf->temperatura}}" id="telefono" required>
                    </div>




                </div>





            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" value="required">Añadir medico</button>
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
