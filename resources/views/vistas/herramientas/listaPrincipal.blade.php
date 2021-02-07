@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevaHerramienta')}}">
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
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TALLER</th>
                                <th class="text-center">ASIGNADAS</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>1</td>
                                <td>Herramienta 1</td>
                                <td>8</td>
                                <td>2</td>
                                <td>10</td>


                                <td class="text-center">
                                    <button class="btn btn-warning" title="Editar">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-dark" onclick="modalBaja()" title="Dar de baja">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')" title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>Herramienta 2</td>
                                <td>2</td>
                                <td>2</td>
                                <td>4</td>


                                <td class="text-center">
                                    <button class="btn btn-warning" title="Editar">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-dark" onclick="modalBaja()" title="Dar de baja">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')"  title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>3</td>
                                <td>Herramienta 3</td>
                                <td>12</td>
                                <td>0</td>
                                <td>12</td>


                                <td class="text-center">
                                    <button class="btn btn-warning" title="Editar">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-dark" onclick="modalBaja()" title="Dar de baja">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="modalEliminar('h',
                                    'herramientas')"  title="Eliminar">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalBaja" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Dar de baja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que desea dar de baja esta herramienta?</p>
                    <div class="form-group">
                        <label for="">Responsable de la baja</label>
                        <select class="form-control">
                            <option value="">Empleado 1</option>
                            <option value="">Empleado 2</option>
                            <option value="">Empleado 3</option>
                            <option value="">Empleado 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Motivo</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3" placeholder="Motivo de la baja"></textarea>
                    </div>

                    <br>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Eliminar</button>
                </div>


            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>

            function modalBaja() {
                $('#modalBaja').modal('show');
            }

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
