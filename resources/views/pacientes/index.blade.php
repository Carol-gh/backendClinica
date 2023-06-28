@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Pacientes</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('pacientes.create') }}">Registrar Paciente</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="pacientes">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($pacientes as $paciente)
                  
                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->ci }}</td>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->edad }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->telefono }}</td>

                            @if ($paciente->estado == 0)
                                <td>Inactivo</td>
                            @else
                                <td>Activo</td>
                            @endif


                            <td>
                                <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                    href="{{ route('pacientes.edit', $paciente) }}"><i class="fas fa-pencil-alt"></i>
                                    Editar</a>

                                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i
                                            class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                       
                       @endforeach
                

                </tbody>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#pacientes').DataTable({
            autoWidth: false
        });
    </script>
@endsection
