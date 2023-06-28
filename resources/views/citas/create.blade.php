@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Citas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('citas.store') }}" method="post">
                @csrf
   

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha">Ingresar Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hora">Ingresar Hora</label>
                        <input type="time" name="hora" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="id_medico">Ingresar Medico</label>
                        <select name="id_medico" class="focus border-primary  form-control">
                            @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="id_paciente">Ingresar Paciente</label>
                        <select name="id_paciente" class="focus border-primary  form-control">
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <label for="descripcion">Ingresar Descripcion</label>
                        <textarea type="text" name="descripcion" class="form-control" value="" required> </textarea>
                    </div>
                </div>

                <input type="text" name="descripcionD" class="form-control" value="En Espera" hidden>
                <input type="text" name="recetaD" class="form-control" value="En Espera" hidden>
                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Registrar Cita</button>
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
