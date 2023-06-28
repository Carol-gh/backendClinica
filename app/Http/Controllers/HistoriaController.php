<?php

namespace App\Http\Controllers;

use App\Models\antecedenteNoPato;
use App\Models\antecedentePato;
use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Documento;
use App\Models\HistoriaClinica;
use App\Models\medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;
use Spatie\Activitylog\Models\Activity;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = HistoriaClinica::all();
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
        $medicos = medico::all();
        return view('historias.create', compact('pacientes','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antenp = new antecedenteNoPato();
        $antenp->inmunizacion = $request->inmunizacion;
        $antenp->alcohol = $request->alcohol;
        $antenp->tabaquismo = $request->tabaquismo;
        $antenp->padre = $request->padre;
        $antenp->enfermedad_padre = $request->enfermedad_padre;
        $antenp->madre = $request->madre;
        $antenp->enfermedad_madre = $request->enfermedad_madre;
        $antenp->cant_hermano = $request->cant_hermano;
        $antenp->cant_vivo = $request->cant_vivo;
        $antenp->enfermedad_h = $request->enfermedad_h;
        $antenp->save();

        $antep = new antecedentePato();

        $antep->cardiovas = $request->cardiovas;
        $antep->pulmonar = $request->pulmonar;
        $antep->digestivo = $request->digestivo;
        $antep->diabetes = $request->diabetes;
        $antep->renales = $request->renales;
        $antep->quirurgico = $request->quirurgico;
        $antep->alergico = $request->alergico;
        $antep->transfusion = $request->transfusion;
        $antep->medicamento = $request->medicamento;
        $antep->descripcion = $request->descripcionPato;
        $antep->save();

        $historia = new HistoriaClinica();
        $historia->descripcion = $request->descripcion;
        $historia->enfermedad_act = $request->enfermedad_act;
        $historia->diagnostico = $request->diagnostico;
        $historia->plan_terapeutico = $request->plan_terapeutico;
        $historia->id_paciente = $request->id_paciente;
        $historia->id_medico = $request->id_medico;
        $historia->id_antep = $antep->id;
        $historia->id_antenp = $antenp->id;
        $historia->save();

        $files = $request->file('files');


        foreach ($files as $file) {

            $folder = "archivos";

            $doc = new Documento();
            $doc->descripcion = $request->desDoc;
            
            $path = Storage::disk('s3')->put($folder, $file, 'public');
          
            $doc->url = $path;
            $doc->nombre = basename($path);
            $doc->id_historia = $historia->id;
            $doc->save();

           //return Storage::disk('s3')->url($doc->url); 
        }
        activity()->useLog('Historias')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $historia->id;
        $lastActivity->save();

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
        $historia = HistoriaClinica::find($id);
        $antep = antecedentePato::where('id', $historia->id_antep)->first();
        $antenp = antecedenteNoPato::where('id', $historia->id_antenp)->first();
        $paciente = Paciente::find($historia->id_paciente);
        $citas = Cita::all();
        $diags = Diagnostico::all();
        $documentos = Documento::all();

        activity()->useLog('Historias')->log('Accedió')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $historia->id;
        $lastActivity->save();

        return view('historias.show', compact('historia', 'antep', 'antenp', 'paciente', 'citas', 'diags', 'documentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $historia = HistoriaClinica::find($id);
        
        $antep = antecedentePato::where('id', $historia->id_antep)->first();
        $antenp = antecedenteNoPato::where('id', $historia->id_antenp)->first();
        $pacientes = Paciente::all();
        $documentos = Documento::all();

        return view('historias.edit', compact('historia', 'antep', 'antenp', 'pacientes','documentos'));
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
        $historia = HistoriaClinica::find($id);

        $antenp = antecedenteNoPato::where('id', $historia->id_antenp)->first();
        $antenp->inmunizacion = $request->inmunizacion;
        $antenp->alcohol = $request->alcohol;
        $antenp->tabaquismo = $request->tabaquismo;
        $antenp->padre = $request->padre;
        $antenp->enfermedad_padre = $request->enfermedad_padre;
        $antenp->madre = $request->madre;
        $antenp->enfermedad_madre = $request->enfermedad_madre;
        $antenp->cant_hermano = $request->cant_hermano;
        $antenp->cant_vivo = $request->cant_vivo;
        $antenp->enfermedad_h = $request->enfermedad_h;
        $antenp->save();

        $antep = antecedentePato::where('id', $historia->id_antep)->first();
        $antep->cardiovas = $request->cardiovas;
        $antep->pulmonar = $request->pulmonar;
        $antep->digestivo = $request->digestivo;
        $antep->diabetes = $request->diabetes;
        $antep->renales = $request->renales;
        $antep->quirurgico = $request->quirurgico;
        $antep->alergico = $request->alergico;
        $antep->transfusion = $request->transfusion;
        $antep->medicamento = $request->medicamento;
        $antep->descripcion = $request->descripcionPato;
        $antep->save();

        $historia->descripcion = $request->descripcion;
        $historia->enfermedad_act = $request->enfermedad_act;
        $historia->diagnostico = $request->diagnostico;
        $historia->plan_terapeutico = $request->plan_terapeutico;
        $historia->id_paciente = $request->id_paciente;
        $historia->id_antep = $antep->id;
        $historia->id_antenp = $antenp->id;
        $historia->save();

        activity()->useLog('Historias')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $historia->id;
        $lastActivity->save();

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
        $historia = HistoriaClinica::find($id);

        activity()->useLog('Historias')->log('Eliminó Historia')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $historia->id;
        $lastActivity->save();

        $antenp = antecedenteNoPato::where('id', $historia->id_antenp);
        $antep = antecedentePato::where('id', $historia->id_antep);
        $historia->delete();
        $antenp->delete();
        $antep->delete();

        return redirect()->route('historias.index');
    }

    public function elim_archivo($id)
    {   
    
        $doc = Documento::find($id);
        
        activity()->useLog('Historias')->log('Eliminó Archivo')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $doc->id;
        $lastActivity->save();
        
        Storage::disk('s3')->delete($doc->url);
 

        $doc->delete();

        return redirect()->back();

    }
}
