@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Medico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('medicos.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="edad">Ingresar Edad</label>
                        <input type="number" name="edad" class="form-control" value="" required>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="sexo">Seleccione Genero</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Ingresar Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="" required>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <label for="correo">Ingresar Email</label>
                        <input type="email" name="email" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Ingresar Estado</label>
                            <select name="estado" class="focus border-primary  form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-6">
                        <label for="password">Ingresar Contraseña</label>
                        <input type="text" name="password" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion">Ingresar Especialidad</label>
                        <input type="text" name="descripcion" class="form-control" value="" required>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <label for="direccion">Ingresar Direccion</label>
                        <textarea type="text" name="direccion" class="form-control" value="" required> </textarea>

                    </div>
                </div>


                <br>

                <div>
                    <button class="btn btn-primary" type="submit" value="required">Añadir Medico</button>
                    <a class="btn btn-danger" href="{{ route('medicos.index') }}">Volver</a>
                </div>


        </div>

        </form>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
