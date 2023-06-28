<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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
        return view('pacientes.index', compact('pacientes'));
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
        $paciente->nombre = $request->input('nombre');
        $paciente->edad = $request->input('edad');
        $paciente->sexo = $request->input('sexo');
        $paciente->direccion = $request->input('direccion');
        $paciente->telefono = $request->input('telefono');
        $paciente->estado = $request->input('estado');
        $paciente->save();

        $user = new User();
        $user->name = $paciente->nombre;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->cod_p = $paciente->id;
        $user->assignRole('Paciente');
        $user->save();

        activity()->useLog('Pacientes')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $paciente->id;
        $lastActivity->save();

        return redirect()->route('pacientes.index', compact('paciente'));
       
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
        $paciente = Paciente::findOrFail($id);
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
        $paciente->sexo = $request->input('sexo');
        $paciente->direccion = $request->input('direccion');
        $paciente->telefono = $request->input('telefono');
        $paciente->estado = $request->input('estado');
        $paciente->save();

        $user = User::where('cod_p',$paciente->id)->first();
        $user->name = $paciente->nombre;
        $user->save();

        activity()->useLog('Pacientes')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $paciente->id;
        $lastActivity->save();

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
        $paciente = Paciente::findOrFail($id);

        activity()->useLog('Pacientes')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $paciente->id;
        $lastActivity->save();

        $paciente->delete();

        $user = User::where('cod_p', $paciente->id);
        $user->delete();

        

        return redirect()->route('pacientes.index');
    }
}
