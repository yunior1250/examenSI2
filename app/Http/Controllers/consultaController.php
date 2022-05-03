<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class consultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $consultas = Consulta::all();

        return view('consulta.index', compact('medicos', 'pacientes', 'consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();

        return view('consulta.create', compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = new Consulta();
        $consulta->descripcion = $request->input('descripcion');
        $consulta->fecha = $request->input('fecha');
        $consulta->hora = $request->input('hora');
        $consulta->fecha = $request->input('fecha');
        $consulta->id_medico = $request->input('id_medico');
        $consulta->id_paciente = $request->input('id_paciente');
        $consulta->save();

        return redirect()->route('consulta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::where('id',$id)->first();
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consulta.edit', compact('medicos', 'pacientes', 'consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::where('id',$id)->first();
        $consulta->descripcion = $request->input('descripcion');
        $consulta->fecha = $request->input('fecha');
        $consulta->hora = $request->input('hora');
        $consulta->fecha = $request->input('fecha');
        $consulta->id_medico = $request->input('id_medico');
        $consulta->id_paciente = $request->input('id_paciente');
        $consulta->save();

        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Consulta::where('id',$id)->first();
        $cita->delete();

        return redirect()->route('consulta.index');
    }
}
