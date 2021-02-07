@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Productos dados de Baja
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
                                <th>COD</th>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                                <th>COSTO</th>
                                <th>FECHA</th>
                                <th>MOTIVO</th>
                                <th>OPC</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr>
                                <td>1</td>
                                <td>Producto X</td>
                                <td>Categoria X</td>
                                <td>20 Bs</td>
                                <td>10-DIC-2020</td>
                                <td>Extraviada</td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Producto X</td>
                                <td>Categoria X</td>
                                <td>20 Bs</td>
                                <td>21-DIC-2020</td>
                                <td>Dañado</td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Producto X</td>
                                <td>Categoria X</td>
                                <td>20 Bs</td>
                                <td>05-ENE-2021</td>
                                <td>Dañado</td>
                                <td>
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
