@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Actualizar Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('pacientes.update', $paciente) }}">
                @csrf
                @method('PATCH')


                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="ci">Ingresar Nombre</label>
                        <input type="text" name="ci" class="form-control" value="{{ $paciente->ci }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edad">Ingresar Edad</label>
                        <input type="number" name="edad" class="form-control" value="{{ $paciente->edad }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sexo">Seleccione Genero</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            @if ($paciente->sexo == 'Masculino')
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            @else
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            @endif

                        </select>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <label for="direccion">Ingresar Direccion</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $paciente->direccion }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Ingresar Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="{{ $paciente->telefono }}" required>
                    </div>
                </div>
               

                <div class="form-group">
                    <label for="estado">Ingresar Estado</label>
                    <select name="estado" class="focus border-primary  form-control">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                
                <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
                <a class="btn btn-danger" href="{{ route('pacientes.index') }}">Volver</a>

            </form>
        </div>
    </div>
@stop
