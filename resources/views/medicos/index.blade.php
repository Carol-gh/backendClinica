@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Medicos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        @can('Admin')
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('medicos.create') }}">Registrar Medico</a>

        </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="medicos">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre </th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Estado</th>
                        <th>Especialidad</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($medicos as $medico)
                        @can('Admin')
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nombre }}</td>
                                <td>{{ $medico->edad }}</td>
                                <td>{{ $medico->sexo }}</td>

                                <td>{{ $medico->direccion }}</td>
                                <td>{{ $medico->telefono }}</td>

                                @if ($medico->estado == 0)
                                    <td>Inactivo</td>
                                @else
                                    <td>Activo</td>
                                @endif

                                <td>
                                    @foreach ($esps as $esp)
                                        @if ($medico->id == $esp->id_medico)
                                            *{{ $esp->descripcion }} <br>
                                        @endif
                                    @endforeach
                                </td>
                        

                        
                            <td>

                                <a href="{{ url('medicos/especialidad', $medico->id) }}" style="margin-top: 0.35rem"
                                    class="btn btn-warning btn-sm"><i class="fas fa-plus-square"></i> Especialidad</a>

                                <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                    href="{{ route('medicos.edit', $medico) }}"><i class="fas fa-pencil-alt"></i> Editar</a>



                                <form action="{{ route('medicos.destroy', $medico) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i
                                            class="fas fa-trash"></i> Eliminar</button>


                                </form>



                            </td>
                        </tr>
                        @endcan

                        @can('Medico')
                            @if (Auth::user()->cod_m == $medico->id)
                                
                            
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nombre }}</td>
                                <td>{{ $medico->edad }}</td>
                                <td>{{ $medico->sexo }}</td>

                                <td>{{ $medico->direccion }}</td>
                                <td>{{ $medico->telefono }}</td>

                                @if ($medico->estado == 0)
                                    <td>Inactivo</td>
                                @else
                                    <td>Activo</td>
                                @endif

                                <td>
                                    @foreach ($esps as $esp)
                                        @if ($medico->id = $esp->id_medico)
                                            *{{ $esp->descripcion }} <br>
                                        @endif
                                    @endforeach
                                </td>
                        

                        
                            <td>

                               

                                <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                    href="{{ route('medicos.edit', $medico) }}"><i class="fas fa-pencil-alt"></i> Editar</a>



                                



                            </td>
                        </tr>
                        @endif
                        @endcan

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
        $('#medicos').DataTable({
            autoWidth: false
        });
    </script>
@endsection
