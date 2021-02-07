@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Ingresos de herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevoIngreso')}}">
                                <i class="fa fa-plus"></i>  Nuevo
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
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center w-25">OPC</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr class="text-center">
                                <td>1</td>
                                <td>04-ENE-2020</td>


                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verIngreso')}}" title="Ver">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'herramientas')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>14-ENE-2020</td>

                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verIngreso')}}" title="Ver">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'herramientas')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>3</td>
                                <td>04-FEB-2020</td>

                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{url('herramientas/verIngreso')}}" title="Ver">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'herramientas')">
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
