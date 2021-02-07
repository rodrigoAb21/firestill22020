@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Empleados
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('empleados/create')}}">
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
                                <th>APELLIDO</th>
                                <th>CI</th>
                                <th>TELEFONO</th>
                                <th>DIRECCION</th>
                                <th>CORREO</th>

                                <th class="text-center w-25">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td >1</td>
                                <td >Empleado 1</td>
                                <td >Apellido 1</td>
                                <td >1010101</td>
                                <td >78945612</td>
                                <td >Direccion 1</td>
                                <td >empleado1@gmail.com</td>

                                <td class="text-center" >
                                    <a href="{{url('empleados/1/edit')}}">
                                        <button class="btn btn-warning">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'h')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td >2</td>
                                <td >Empleado 2</td>
                                <td >Apellido 2</td>
                                <td >2020202</td>
                                <td >78965412</td>
                                <td >Direccion 2</td>
                                <td >empleado2@gmail.com</td>

                                <td class="text-center">

                                        <button class="btn btn-warning">
                                            <i class="fa fa-pen"></i>
                                        </button>

                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h', 'empleados')">
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
