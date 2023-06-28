@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('pacientes.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="ci">Ingresar CI</label>
                        <input type="text" name="ci" class="form-control" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edad">Ingresar Edad</label>
                        <input type="number" name="edad" class="form-control" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sexo">Seleccione su Genero</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Ingresar Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado">Ingresar Estado</label>
                        <select name="estado" class="focus border-primary  form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <label for="direccion">Ingresar Direccion</label>
                        <input type="text" name="direccion" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="correo">Ingresar Email</label>
                        <input type="email" name="email" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Ingresar Contraseña</label>
                        <input type="text" name="password" class="form-control" value="" required>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Añadir Paciente</button>
                    <a class="btn btn-danger" href="{{ route('pacientes.index') }}">Volver</a>
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
