@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Asignaciones de herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevaAsignacion')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>

                    <div class="mb-3">
                        <input class="form-control" placeholder="Buscar..." type="text">
                    </div>

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
                            <tr>
                                <td>1</td>
                                <td>04-ENE-2020</td>
                                <td>Empleado 1</td>
                                <td>Activo</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verAsignacion')}}" title="Reingreso">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{url('herramientas/reingreso')}}" title="Reingreso">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')" title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>10-ENE-2020</td>
                                <td>Empleado 3</td>
                                <td>Activo</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verAsignacion')}}" title="Reingreso">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{url('herramientas/reingreso')}}" title="Reingreso">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')" title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>17-ENE-2020</td>
                                <td>Empleado 4</td>
                                <td>Finalizado</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verAsignacion')}}" title="Reingreso">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{url('herramientas/reingreso')}}" title="Reingreso">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')" title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
