<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;

class medController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $medicos =Medico::all();
        $esps = Especialidad::all();
        return view('medicos.index', compact('medicos','esps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $esps = Especialidad::all();
        return view('medicos.create', compact('esps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $medic = new Medico();
        $medic->nombre = $request->nombre;
        $medic->edad = $request->edad;
        $medic->direccion = $request->direccion;
        $medic->telefono = $request->telefono;
        $medic->id_especialidad= $request->especialidad;
        $medic->save();

        $usuario= new User();
        $usuario->name =$medic->nombre;
        $usuario->email =$request->input('email') ;
        $usuario->password = bcrypt($request->input('password') );
        $usuario->id_p = $medic->id;
        $usuario->assignRole('Medico');
        $usuario->save();

        return redirect()->route('medicos.index');

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
        $medc=medico::findOrFail($id);
        $esps=Especialidad::all();
        $user=User::where ('id_p',$medc->id)->first();
        return view('medicos.edit',compact('medc','esps','user'));
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



        $medic = Medico::findOrFail($id);

        $medic->nombre = $request->input('nombre');
        $medic->edad = $request->input('edad');
        $medic->direccion = $request->input('direccion');
        $medic->telefono = $request->input('telefono');
        $medic->id_especialidad= $request->especialidad;
        $medic->save();

        $user=User::where ('id_p',$medic->id)->first();
        $user->name = $medic->nombre;
        $user->email = $request->input('email');

        $user->save();
        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medic= Medico::findOrFail($id);


        $user = User::where('id_p', $medic->id);
        $user->delete();

        $medic->delete();
        return redirect()->route('medicos.index');
    }
}
