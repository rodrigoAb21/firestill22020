@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Asignaciones de asignaciones
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('asignaciones/nuevaAsignacion')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th>COD</th>
                                <th>FECHA</th>
                                <th>RESPONSABLE</th>
                                <th>ESTADO</th>
                                <th class="text-center w-25">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaciones as $asignacion)
                                <tr class="text-center">
                                    <td>{{$asignacion->id}}</td>
                                    <td>{{$asignacion->nombre}}</td>
                                    <td>{{$asignacion->cantidad_taller}}</td>
                                    <td>{{$asignacion->cantidad_asignada}}</td>
                                    <td>
                                        <a href="{{url('asignaciones/'.$asignacion->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-dark">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$asignacion -> nombre}}', '{{url('asignaciones/'.$asignacion -> id)}}')">
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
