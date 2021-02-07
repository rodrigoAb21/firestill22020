@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo Ingreso
                    </h3>


                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input required
                                       type="date"
                                       class="form-control"
                                       value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                       name="fecha">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Factura</label>
                                <input required
                                       type="file"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nro Factura</label>
                                <input required
                                       type="text"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Proveedor</label>
                                <select class="form-control">
                                    <option value="">Proveedor 1</option>
                                    <option value="">Proveedor 2</option>
                                    <option value="">Proveedor 3</option>
                                    <option value="">Proveedor 4</option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">

                                <button id="btn_agregar" type="button" onclick="agregar()"  class="btn btn-success btn-sm btn-block">
                                    <span class="fa fa-plus fa-2x"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-right">OPC</th>
                                <th class="text-center w-25">PRODUCTO</th>
                                <th class="text-center w-25">CATEGORIA</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">COSTO U. Bs</th>
                                <th class="text-center">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td><span id="total">XXX</span> Bs</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('inventario/listaIngresos')}}" class="btn btn-warning">Atras</a>
                    <a href="{{url('inventario/listaIngresos')}}" class="btn btn-info">Guardar</a>

                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endpush
    @push('scripts')
        <script>
            var cont = 0;
            function agregar() {
                if(cont>=0) {

                    var fila =
                        '<tr id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input class="form-control" name="ewtew" >'+
                        '</td>' +
                        '<td>' +
                        ' <select class="form-control">'+
                        '<option>Categoria 1</option>'+
                        '<option>Categoria 2</option>'+
                        '<option>Categoria 3</option>'+
                        '<option>Categoria 4</option>'+
                        '</select>'+
                        '</td>' +
                        '<td>' +
                        '   <input class="form-control" type="number" name="qweqw" >'+
                        '</td>' +
                        '<td>' +
                        '   <input class="form-control" name="asd" >'+
                        '</td>' +
                        '<td>' +
                        '</td>' +
                        '</tr>';


                    cont++;


                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles

                }

            }

            function quitar(index){

                cont--;

                $("#fila" + index).remove();
            }


        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    @endpush
@endsection
