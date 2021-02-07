@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Ingreso
                    </h3>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input readonly
                                           type="date"
                                           class="form-control"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           name="fecha">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Factura</label>
                                    <input readonly
                                           type="text"
                                           value="0123"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Proveedor</label>
                                    <input readonly
                                           value="Proveedor 1"
                                           type="text"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <img src="{{asset('img/factura.jpg')}}" class="img-thumbnail" height="200px" width="200px" alt="">
                                </div>
                            </div>
                        </div>




                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center w-25">PRODUCTO</th>
                                <th class="text-center w-25">CATEGORIA</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">COSTO U. Bs</th>
                                <th class="text-center">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            <tr class="text-center">
                                <td>Producto 1</td>
                                <td>Categoria 1</td>
                                <td>2</td>
                                <td>20</td>
                                <td>40</td>
                            </tr>
                            <tr class="text-center">
                                <td>Producto 2</td>
                                <td>Categoria 3</td>
                                <td>3</td>
                                <td>120</td>
                                <td>360</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td><span id="total">400</span> Bs</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atras</a>

                </div>
            </div>
        </div>
    </div>
@endsection