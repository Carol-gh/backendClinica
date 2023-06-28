@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Citas Medicas</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        @can('Admin')
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('citas.create') }}">Registrar Cita Medica</a>

        </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="citas">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripcion</th>
                        <th>Medico</th>
                        <th>Paciente</th>
                        <th>Diagnostico</th>
                        <th>Receta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    
                    @foreach ($citas as $cita)
                    @can('Admin')
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->descripcion }}</td>
                            @foreach ($medicos as $medico)
                                @if ($cita->id_medico == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($cita->id_paciente == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($diagnosticos as $diagnostico)
                                @if (($cita->id == $diagnostico->id_cita))
                                    <td>{{$diagnostico->descripcion}}</td>
                                    <td>{{$diagnostico->receta}}</td>

                                @endif
                                
    
                            @endforeach
                           
                            <td>

                                <a href="{{ url('citas/diagnostico', $cita->id) }}" style="margin-top: 0.35rem" class="btn btn-warning btn-sm"><i class="fas fa-plus-square"></i> Diagnostico</a>


                                <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                    href="{{ route('citas.edit', $cita) }}"><i class="fas fa-pencil-alt"></i> Editar</a>



                                <form action="{{ route('citas.destroy', $cita) }}" method="POST">
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
                        @if (Auth::user()->cod_m == $cita->id_medico)
                            
                        
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->descripcion }}</td>
                            @foreach ($medicos as $medico)
                                @if ($cita->id_medico == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($cita->id_paciente == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($diagnosticos as $diagnostico)
                                @if (($cita->id == $diagnostico->id_cita))
                                    <td>{{$diagnostico->descripcion}}</td>
                                    <td>{{$diagnostico->receta}}</td>

                                @endif
                                
    
                            @endforeach
                           
                            <td>

                                <a href="{{ url('citas/diagnostico', $cita->id) }}" style="margin-top: 0.10rem" class="btn btn-warning btn-sm"><i class="fas fa-plus-square"></i> Diagnostico</a>



                            </td>
                        </tr>
                        @endif
                        @endcan

                        @can('Paciente')
                        @if (Auth::user()->cod_p == $cita->id_paciente)
                            
                        
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->descripcion }}</td>
                            @foreach ($medicos as $medico)
                                @if ($cita->id_medico == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($cita->id_paciente == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($diagnosticos as $diagnostico)
                                @if (($cita->id == $diagnostico->id_cita))
                                    <td>{{$diagnostico->descripcion}}</td>
                                    <td>{{$diagnostico->receta}}</td>

                                @endif
                                
    
                            @endforeach
                           
                            <td>

                               NO DISPONIBLE


                              

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
        $('#citas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
