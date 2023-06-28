<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    public function create()
    {
        //
    }

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
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $paciente->id;
        $lastActivity->save();

        return response()->json(['message' => 'Paciente creado correctamente']);
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return response()->json($paciente);
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return response()->json($paciente);
    }

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

        $user = User::where('cod_p', $paciente->id)->first();
        $user->name = $paciente->nombre;
        $user->save();

        activity()->useLog('Pacientes')->log('Editó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $paciente->id;
        $lastActivity->save();

        return response()->json(['message' => 'Paciente actualizado correctamente']);
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        activity()->useLog('Pacientes')->log('Eliminó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $paciente->id;
        $lastActivity->save();

        $paciente->delete();

        $user = User::where('cod_p', $paciente->id);
        $user->delete();

        return response()->json(['message' => 'Paciente eliminado correctamente']);
    }
}
