<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;

class pacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente->ci = $request->input('ci');
        $paciente->nombre = $request->nombre;
        $paciente->edad = $request->input('edad');
        $paciente->direccion = $request->input('direccion');
        $paciente->telefono = $request->input('telefono');
        $paciente->save();

        $user = new User();
        $user->name = $paciente->nombre;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->id_p = $paciente->id;
        $user->assignRole('Paciente');
        $user->save();

        return redirect()->route('pacientes.index',compact('paciente'));
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
        $paciente=Paciente::findOrFail($id);
        return view('pacientes.edit',compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);
        $paciente->ci = $request->input('ci');
        $paciente->nombre = $request->input('nombre');
        $paciente->edad = $request->input('edad');
        $paciente->telefono = $request->input('telefono');
        $paciente->direccion = $request->input('direccion');
        $paciente->save();

        $user = User::where('id_p',$paciente->id)->first();
        $user->name = $paciente->nombre;
        $user->save();

        return redirect()->route('pacientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
