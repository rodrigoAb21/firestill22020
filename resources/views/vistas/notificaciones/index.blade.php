@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Bandeja de Notificaciones
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

                            <tr class="text-center table-info">
                                <td>3</td>
                                <td>15-ENE-2020</td>
                                <td>Recordatorio: Realizar visita de inspección al cliente: 748</td>
                                <td class="text-center">
                                    <button class="btn btn-info">
                                        <i class="fa fa-calendar-day"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>15-ENE-2020</td>
                                <td>Recordatorio: Realizar visita de inspección al cliente: 748</td>
                                <td class="text-center">
                                    <button class="btn btn-info">
                                        <i class="fa fa-calendar-day"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td>15-ENE-2020</td>
                                <td>Recordatorio: Realizar visita de inspección al cliente: 748</td>
                                <td class="text-center">
                                    <button class="btn btn-info">
                                        <i class="fa fa-calendar-day"></i>
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
