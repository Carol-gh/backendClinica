@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')


    <h1>Historia Clinica</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('historias.update', $historia) }}" method="post">
                @csrf
                @method('put')
                <h2>Ficha de Identificación</h2>

                <div class="row">
                    <div class="col-md-12">
                        <label for="estado">Paciente :</label>
                        <select name="id_paciente" class="focus border-primary  form-control" disabled>

                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>





                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="descripcion">Descripcion de Historia :</label>
                        <textarea type="text" name="descripcion" class="form-control" value=""
                            disabled>{{ $historia->descripcion }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="diagnostico">Diagnostico :</label>
                        <textarea type="text" name="diagnostico" class="form-control" value=""
                            disabled>{{ $historia->diagnostico }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="enfermedad_act">Enfermedad Actual:</label>
                        <input type="text" name="enfermedad_act" class="form-control"
                            value="{{ $historia->enfermedad_act }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="plan_terapeutico">Plan Terapeutico:</label>
                        <input type="text" name="plan_terapeutico" class="form-control"
                            value="{{ $historia->plan_terapeutico }}" disabled>
                    </div>
                </div>

                <br>
                <h2>Antecedentes Patologicos</h2>

                <div class="row">

                    <div class="col-md-4">
                        <label for="caridovas">Cardivascular:</label>
                        <select name="cardiovas" class="focus border-primary  form-control" disabled>

                            @if ($antep->cardiovas == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif

                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pulmonar">Pulmonar:</label>
                        <select name="pulmonar" class="focus border-primary  form-control" disabled>
                            @if ($antep->pulmonar == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="alergico">Alargias:</label>
                        <select name="alergico" class="focus border-primary  form-control" disabled>
                            @if ($antep->alergico == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <label for="digestivo">Digestivos:</label>
                        <select name="digestivo" class="focus border-primary  form-control" disabled>
                            @if ($antep->digestivo == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="renales">Renales:</label>
                        <select name="renales" class="focus border-primary  form-control" disabled>
                            @if ($antep->renales == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quirurgico">Quirurgicos:</label>
                        <select name="quirurgico" class="focus border-primary  form-control" disabled>
                            @if ($antep->quirurgico == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row">



                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="transfusion">Transfusion :</label>
                        <select name="transfusion" class="focus border-primary  form-control" disabled>
                            @if ($antep->transfusion == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="diabetes">Diabetes :</label>
                        <select name="diabetes" class="focus border-primary  form-control" disabled>
                            @if ($antep->diabetes == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="medicamento">Medicamentos de Antecedentes-Patologicos :</label>
                        <textarea type="text" name="medicamento" class="form-control" value="" disabled>{{ $antep->medicamento }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion">Detallado de Uso de Medicamentos :</label>
                        <textarea type="text" name="descripcionPato" class="form-control" value=""
                            disabled>{{ $antep->descripcion }}</textarea>
                    </div>
                </div>

                <br>

                <h2>Antecedentes NO Patologicos</h2>

                <div class="row">
                    <div class="col-md-4">
                        <label for="inmunizacion">Inmunizacion :</label>
                        <select name="inmunizacion" class="focus border-primary  form-control" disabled>
                            @if ($antenp->inmunizacion == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="alcohol">Alcoholismo :</label>
                        <select name="alcohol" class="focus border-primary  form-control" disabled>
                            @if ($antenp->alcohol == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tabaquismo">Tabaquismo :</label>
                        <select name="tabaquismo" class="focus border-primary  form-control" disabled>
                            @if ($antenp->tabaquismo == 'SI')
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            @else
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="padre">Nombre de Padre:</label>
                        <input type="text" name="padre" class="form-control" value="{{ $antenp->padre }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="enfermedad_padre">Enfermedad de Padre:</label>
                        <input type="text" name="enfermedad_padre" class="form-control"
                            value="{{ $antenp->enfermedad_padre }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="madre">Nombre de Madre:</label>
                        <input type="text" name="madre" class="form-control" value="{{ $antenp->madre }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="enfermedad_madre">Enfermedad de Madre:</label>
                        <input type="text" name="enfermedad_madre" class="form-control"
                            value="{{ $antenp->enfermedad_madre }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="cant_hermano">Cantidad de Hermanos:</label>
                        <input type="number" name="cant_hermano" class="form-control"
                            value="{{ $antenp->cant_hermano }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="cant_vivo">Cantidad de Hermanos Vivos:</label>
                        <input type="number" name="cant_vivo" class="form-control" value="{{ $antenp->cant_vivo }}"
                            disabled>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md">
                        <label for="enfermedad_h">Enfermedad de Hermanos:</label>
                        <textarea type="text" name="enfermedad_h" class="form-control" value=""
                            disabled>{{ $antenp->enfermedad_h }}</textarea>
                    </div>
                </div>



                <br>
                <h2>Citas Medicas</h2>
                @foreach ($citas as $cita)
                    @if ($cita->id_paciente == $paciente->id)
                        <br>
                        <h3>Citas #{{ $cita->id }}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="padre">Fecha:</label>
                                <input type="text" class="form-control" value="{{ $cita->fecha }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="padre">Hora:</label>
                                <input type="text" class="form-control" value="{{ $cita->hora }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="padre">Descripción:</label>
                                <textarea type="text" name="padre" class="form-control" value="" disabled>{{ $cita->descripcion }}</textarea>
                            </div>
                        </div>
                        @foreach ($diags as $diag)
                            @if ($diag->id_cita == $cita->id)
                                <h3>Diagnostico de la Cita </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="padre">Descripción:</label>
                                        <textarea type="text" class="form-control" value="" disabled>{{ $diag->descripcion }} </textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="padre">Receta:</label>
                                        <textarea type="text" class="form-control" value="" disabled>{{ $diag->receta }} </textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach








                <div class="form-group">

                    <a class="btn btn-danger" href="{{ route('historias.index') }}">Volver</a>
                </div>

            </form>
            <br>
            <h3>Documentos Clinicos :</h3>



            <div class="card-body">
                <table class="table table-striped table-bordered shadow-lg mt-4" id="historias">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Documento Descripcion</th>

                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $doc)
                            @if ($doc->id_historia == $historia->id)
                                <tr>

                                    <td>{{ $doc->id }}</td>
                                    <td>{{ $doc->descripcion }}</td>


                                    <td>
                                        <a class="btn btn-warning btn-sm" style="margin-top: 5px"
                                            href="{{ Storage::disk('s3')->url($doc->url) }}"><i class="fas fa-eye"></i>
                                            Ver </a>
                                        <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                            href="{{ route('documentos.show', $doc) }}" download="{{ $doc->nombre }}">
                                            Descargar Archivo</a>
                                        

                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

@stop
