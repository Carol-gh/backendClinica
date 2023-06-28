@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Diagnostico a Cita</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
       
            <form action="{{ url('citas/diag_store', $diagnostico) }}" method="post" >
                @csrf
                
                     <div class="row">
                         <div class="col-md-6">
                            <label for="descripcion">Diagnostico:</label>
                            <textarea type="text" name="descripcion" class="form-control"  value=""  required></textarea>
                         </div>
                         <div class="col-md-6">
                            <label for="descripcion">Detalles de Receta</label>
                            <textarea type="text" name="receta" class="form-control"  value=""  required></textarea>
                         </div>
                     </div>


            
                       
                     <br>
                   
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Diagnostico</button>
                    <a class="btn btn-danger" href="{{route('citas.index')}}">Volver</a>
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