@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Contratos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevoContrato')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">CLIENTE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">F. INICIO</th>
                                <th class="text-center">F. FIN</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>1</td>
                                <td>YPFB</td>
                                <td>Vigente</td>
                                <td>Vigente</td>
                                <td>Vigente</td>
                                <td class="text-center">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye"></i>
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
