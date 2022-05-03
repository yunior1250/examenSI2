@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Historia Clinica</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('historias.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">

                        <h2>Ficha Medica</h2>
                        <label for="descripcion">Ingresar Descripcion</label>
                        <input type="text" name="descripcion" class="form-control"  value=""  required>

                        <label for="enfermedad_act">Ingresar Enfermedad Actual</label>
                        <input type="text" name="enfermedad_act" class="form-control"  value=""  required>

                        <label for="diagnostico">Ingresar Diagnostico</label>
                        <input type="text" name="diagnostico" class="form-control"  value=""  required>

                        <label for="plan_terapeutico">Ingresar Plan Terapeutico</label>
                        <input type="text" name="plan_terapeutico" class="form-control"  value=""  required>

                        <div class="form-group">
                            <label for="estado">Ingresar Paciente</label>
                            <select name="id_paciente"  class="focus border-primary  form-control">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <h2>Antecedentes Patologicos</h2>
                        <div class="form-group">
                            <label for="caridovas">Cardivascular:</label>
                            <select name="cardiovas"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pulmonar">Pulmonar:</label>
                            <select name="pulmonar"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="digestivo">Digestivos:</label>
                            <select name="digestivo"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="renales">Renales:</label>
                            <select name="renales"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quirurgico">Quirurgicos:</label>
                            <select name="quirurgico"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alergico">Alargias:</label>
                            <select name="alergico"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="transfusion">Transfusion :</label>
                            <select name="transfusion"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>



                        <label for="medicamento">Ingresar Medicamentos:</label>
                        <input type="text" name="medicamento" class="form-control"  value="" required>

                        <label for="descripcion">Ingresar Detallado de Uso de Medicamentos</label>
                        <input type="text" name="descripcion" class="form-control"  value="" required>

                        <h2>Antecedentes NO Patologicos</h2>


                        <div class="form-group">
                            <label for="inmunizacion">Inmunizacion :</label>
                            <select name="inmunizacion"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alcohol">Alcoholismo :</label>
                            <select name="alcohol"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tabaquismo">Tabaquismo :</label>
                            <select name="tabaquismo"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <label for="padre">Ingresar Nombre de Padre:</label>
                        <input type="text" name="padre" class="form-control"  value="" required>

                        <label for="enfermedad_padre">Enfermedad de Padre:</label>
                        <input type="text" name="enfermedad_padre" class="form-control"  value="" required>

                        <label for="madre">Ingresar Nombre de Madre:</label>
                        <input type="text" name="madre" class="form-control"  value="" required>

                        <label for="enfermedad_madre">Enfermedad de Madre:</label>
                        <input type="text" name="enfermedad_madre" class="form-control"  value="" required>

                        <label for="cant_hermano">Ingresar Cantidad de Hermanos:</label>
                        <input type="number" name="cant_hermano" class="form-control"  value="" required>

                        <label for="cant_vivo">Ingresar Cantidad de Hermanos Vivos:</label>
                        <input type="number" name="cant_vivo" class="form-control"  value="" required>

                        <label for="enfermedad_h">Enfermedad de Hermanos:</label>
                        <input type="text" name="enfermedad_h" class="form-control"  value="" required>



                    </div>




                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Historia</button>
                    <a class="btn btn-danger" href="{{route('historias.index')}}">Volver</a>
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
