@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        NUEVA VENTA
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
                                <label>Cliente</label>
                                <select class="form-control">
                                    <option>Cliente 1</option>
                                    <option>Cliente 2</option>
                                    <option>Cliente 3</option>
                                    <option>Cliente 4</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <hr>
                    <h4>Productos</h4>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select class="form-control selectpicker" data-live-search="true" id="selectorInsumo">
                                    <option value="1">1 Producto 1</option>
                                    <option value="2">2 Producto 2</option>
                                    <option value="3">3 Producto 3</option>
                                    <option value="4">4 Producto 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Precio" type="number" id="precio">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
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
                                <th class="text-center">OPC</th>
                                <th class="text-center">COD</th>
                                <th class="text-center w-50">PRODUCTO</th>
                                <th class="text-center">PRECIO</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td><b>TOTAL</b></td>
                                    <td><span id="total">XXX</span> Bs</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('ventas')}}" class="btn btn-warning">Atras</a>
                    <a href="{{url('ventas')}}" class="btn btn-info">Guardar</a>

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
            var total = 0;
            var precio = 0;
            function agregar() {
                precio = $('#precio').val();
                if(cont >= 0 && precio != null && precio >= 0) {
                    nombreInsumo = $('#selectorInsumo option:selected').text();
                    nombreID = $('#selectorInsumo option:selected').val();
                    var fila =
                        '<tr class="text-center" id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        nombreID+
                        '</td>' +
                        '<td>' +
                        nombreInsumo+
                        '</td>' +
                        '<td>' +
                        precio+
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
