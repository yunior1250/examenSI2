<?php

namespace App\Http\Controllers;

use App\Models\AntFamiliares;
use App\Models\AntPersonales;
use App\Models\Bitacora;
use App\Models\HisMedico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class historicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = HisMedico::all();
        $pacientes = Paciente::all();

        return view('historias.index', compact('historias', 'pacientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('historias.create', compact('pacientes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antecep = new AntPersonales();
        $antecep->alcohol=$request->alcohol;
        $antecep->tabaco=$request->tabaco;
        $antecep->alimentacion=$request->alimentacion;
        $antecep->droga=$request->droga;
        $antecep->infuciones=$request->infuciones;
        $antecep->sueño=$request->sueño;
        $antecep->sexualidad=$request->sexualidad;
        $antecep->enfermedadesinfancia=$request->enfermedadesinfancia;
        $antecep->respiratorio=$request->respiratorio;
        $antecep->traumatologico=$request->traumatologico;
        $antecep->quirurgicos=$request->quirurgicos;
        $antecep->alergicos=$request->alergicos;
        $antecep->save();

        $antecef = new AntFamiliares();
        $antecef->inspecciongeneral=$request->inspecciongeneral;
        $antecef->peso=$request->peso;
        $antecef->altura=$request->altura;
        $antecef->temperatura=$request->temperatura;
        $antecef->aspecto=$request->aspecto;
        $antecef->save();

        $hist=new HisMedico();
        $hist->fechanaci=$request->fechanaci;
        $hist->ocupacion=$request->ocupacion;
        $hist->estadocivil=$request->estadocivil;
        //Tipo de Sangre
        $hist->id_paciente=$request->id_paciente;
        $hist->id_antpersonales=$antecep->id;
        $hist->id_antfamiliares=$antecef->id;
        $hist->save();

        $bitacora=new Bitacora();
        $bitacora->id_usuario=Auth::user()->id;
        $bitacora->descripcion=('registro historial');
        $bitacora->save();

        return redirect()->route('historias.index');

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
        $historia =HisMedico::find($id);
        $antp=AntPersonales::where('id',$historia->id_antpersonales);
        $antf=AntFamiliares::where('id',$historia->id_antfamiliares);


        //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        return view('historias.edit',compact('historia','antp','antf'));
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
        $hist= HisMedico::find($id);

        $antecep = AntPersonales::where('id',$hist->id_antpersonales);

        $antecep->alcohol=$request->alccohol;
        $antecep->tabaco=$request->tabaco;
        $antecep->droga=$request->droga;
        $antecep->infuciones=$request->infuciones;
        $antecep->sueño=$request->sueño;
        $antecep->sexualidad=$request->sexualidad;
        $antecep->enfermedadesinfancia=$request->enfermedadesinfancia;
        $antecep->respiratorio=$request->respiratorio;
        $antecep->traumatologico=$request->traumatologico;
        $antecep->quirurgicos=$request->quirurgicos;
        $antecep->alergicos=$request->alergicos;
        $antecep->save();

        $antecef = AntFamiliares::where('id',$hist->id_antfamiliares);
        $antecef->inspecciongeneral=$request->inspecciongeneral;
        $antecef->peso=$request->peso;
        $antecef->altura=$request->altura;
        $antecef->temperatura=$request->temperatura;
        $antecef->aspecto=$request->aspecto;
        $antecef->save();


        $hist->fechanaci=$request->fechanaci;
        $hist->ocupacion=$request->ocupacion;
        $hist->estadocivil=$request->estadocivil;
        $hist->id_paciente=$request->id_paciente;
        $hist->id_antecep=$antecep->id;
        $hist->antecef=$antecef->id;
        $hist->save();

        $bitacora=new Bitacora();
        $bitacora->id_usuario=Auth::user()->id;
        $bitacora->descripcion=('actualizo historial');
        $bitacora->save();

        return redirect()->route('historias.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hist= HisMedico::find($id);

        $antecep = AntPersonales::where('id',$hist->id_antpersonales);
        $antecef = AntFamiliares::where('id',$hist->id_antfamiliares);
        $hist->delete();
        $antecep->delete();
        $antecef->delete();


        $bitacora=new Bitacora();
        $bitacora->id_usuario=Auth::user()->id;
        $bitacora->descriipcion=('elimino historial');
        $bitacora->save();

        return redirect()->route('historias.index');
    }
}
