@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Editar Citas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('citas.update', $cita->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha">Ingresar Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="{{ $cita->fecha }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hora">Ingresar Hora</label>
                        <input type="time" name="hora" class="form-control" value="{{ $cita->hora }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Ingresar Medico</label>
                        <select name="id_medico" class="focus border-primary  form-control">
                            @foreach ($medicos as $medico)
                                @if ($cita->id_medico == $medico->id)
                                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($medicos as $medico)
                                @if (!($cita->id_medico == $medico->id))
                                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="estado">Ingresar Medico</label>
                        <select name="id_paciente" class="focus border-primary  form-control">
                            @foreach ($pacientes as $paciente)
                                @if ($cita->id_paciente == $paciente->id)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($medicos as $medico)
                                @if (!($cita->id_paciente == $paciente->id))
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md">
                        <label for="fecha">Ingresar Descripcion</label>
                        <textarea type="text" name="descripcion" class="form-control" required>{{ $cita->descripcion }} </textarea>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Actualizar Cita</button>
                    <a class="btn btn-danger" href="{{ route('citas.index') }}">Volver</a>
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
