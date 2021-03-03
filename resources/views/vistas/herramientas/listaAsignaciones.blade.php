@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Asignaciones de asignaciones
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevaAsignacion')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">RESPONSABLE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaciones as $asignacion)
                                <tr class="text-center">
                                    <td>{{$asignacion->id}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $asignacion->fecha)->format('d - m - Y')}}</td>
                                    <td>{{$asignacion->empleado->nombre}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{url('herramientas/verAsignacion/'.$asignacion->id)}}">
                                            <button class="btn btn-secondary">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$asignacion -> id}}', '{{url('asignaciones/'.$asignacion -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$asignaciones->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
