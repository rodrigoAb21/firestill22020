@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Bandeja de Alertas
                        <div class="float-right">

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
                                <th class="text-center">DESCRIPCION</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr class="text-center table-danger">
                                <td>3</td>
                                <td>15-ENE-2020</td>
                                <td>¡Extintor fuera de rango! Extintor: 1123 - Cliente: 164</td>

                                <td class="text-center">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>08-ENE-2020</td>
                                <td>¡Baja presión! Extintor: 985421 - Cliente: 451</td>
                                <td class="text-center">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td>02-ENE-2020</td>
                                <td>¡Extintor fuera de rango! Extintor: 3726 - Cliente: 21</td>
                                <td class="text-center">
                                    <button class="btn btn-warning">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
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
