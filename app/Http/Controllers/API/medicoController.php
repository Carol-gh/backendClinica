<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Especialidad;
use App\Models\medico;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class medicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $medicos = medico::all();
        $esps = Especialidad::all();
        return response()->json([
            'medicos' => $medicos,
            'especialidades' => $esps
        ]);
    }

    public function edit($id)
    {
        $medico=medico::findOrFail($id);
        return response()->json([
            'medico' => $medico,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validación para que sea requerido
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'estado' => 'required'
        ]);

        // Crea el medico atributo por atributo
        $medico = new medico();
        $medico->nombre = $request->input('nombre');
        $medico->edad = $request->input('edad');
        $medico->sexo = $request->input('sexo');
        $medico->direccion = $request->input('direccion');
        $medico->telefono = $request->input('telefono');
        $medico->estado = $request->input('estado');
        $medico->save();

        $user = new User();
        $user->name = $medico->nombre;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->cod_m = $medico->id;
        $user->assignRole('Medico');
        $user->save();

        $esp = new Especialidad();
        $esp->descripcion = $request->input('descripcion');
        $esp->id_medico = $medico->id;
        $esp->save();

        activity()->useLog('Medicos')->log('Registró')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $medico->id;
        $lastActivity->save();

        return response()->json([
            'message' => 'Medico registrado exitosamente',
            'medico' => $medico,
            'especialidad' => $esp
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $medico = medico::findOrFail($id);
        $medico->nombre = $request->input('nombre');
        $medico->edad = $request->input('edad');
        $medico->sexo = $request->input('sexo');
        $medico->direccion = $request->input('direccion');
        $medico->telefono = $request->input('telefono');
        $medico->estado = $request->input('estado');
        $medico->save();

        $user = User::where('cod_m', $medico->id)->first();
        $user->name = $medico->nombre;
        $user->save();

        activity()->useLog('Medicos')->log('Editó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $medico->id;
        $lastActivity->save();

        return response()->json([
            'message' => 'Medico actualizado exitosamente',
            'medico' => $medico
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $medico = medico::findOrFail($id);

        activity()->useLog('Medicos')->log('Eliminó')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $medico->id;
        $lastActivity->save();

        $esp = Especialidad::where('id_medico', $medico->id);
        $esp->delete();

        $medico->delete();

        $user = User::where('cod_m', $medico->id);
        $user->delete();

        return response()->json([
            'message' => 'Medico eliminado exitosamente'
        ]);
    }

    public function especialidad($id)
    {
        $medico = medico::findOrFail($id);
        return response()->json($medico);
    }

    /**
     * Store a newly created resource in storage (especialidad).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function esp_store(Request $request)
    {
        $esp = new Especialidad();
        $esp->descripcion = $request->input('descripcion');
        $esp->id_medico = $request->input('id_medico');
        $esp->save();

        activity()->useLog('Especialidad')->log('Registró Especialidad')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $esp->id;
        $lastActivity->save();

        return response()->json([
            'message' => 'Especialidad registrada exitosamente',
            'especialidad' => $esp
        ], 201);
    }
}
