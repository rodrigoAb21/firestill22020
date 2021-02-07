@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Proveedores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('proveedores/create')}}">
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
                                <th>TELEFONO</th>
                                <th>EMAIL</th>
                                <th class="text-center w-25">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>1</td>
                                <td>Proveedor 1</td>
                                <td>79896598</td>
                                <td>proveedor1@mail.com</td>
                                <td class="text-center">
                                    <a href="{{url('proveedores/1')}}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Proveedor 2</td>
                                <td>79896598</td>
                                <td>proveedor2@mail.com</td>
                                <td class="text-center">
                                    <a href="{{url('proveedores/1')}}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Proveedor 3</td>
                                <td>79896598</td>
                                <td>proveedor3@mail.com</td>
                                <td class="text-center">
                                    <a href="{{url('proveedores/1')}}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-pen"></i>
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
