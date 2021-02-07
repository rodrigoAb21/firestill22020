@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Clientes
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('clientes/create')}}">
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
                                <th>COD</th>
                                <th>NOMBRE</th>
                                <th>CI/NIT</th>
                                <th>TELEFONO</th>

                                <th class="text-center w-25">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>1</td>
                                <td>Cliente 1</td>
                                <td>8080808</td>
                                <td>79896598</td>
                                <td class="text-center">
                                    <a href="{{url('clientes/1')}}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'clientes')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Cliente 2</td>
                                <td>1028703022</td>
                                <td>3359845</td>

                                <td class="text-center">
                                    <a href="{{url('clientes/1')}}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                        <button class="btn btn-warning">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'clientes')">
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
