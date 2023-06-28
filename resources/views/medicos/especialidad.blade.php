@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Especialidad a Medico</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
       
            <form action="{{ url('medicos/esp_store') }}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">


                        <input type="text" name="id_medico" class="form-control"  value="{{$medico->id}}"  hidden >
                        <label for="descripcion">Ingresar Especialidad</label>
                        <input type="text" name="descripcion" class="form-control"  value=""  required>

                        
                    </div>

                
                
    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir</button>
                    <a class="btn btn-danger" href="{{route('medicos.index')}}">Volver</a>
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