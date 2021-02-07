@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver venta
                    </h3>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                       name="fecha">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input class="form-control" readonly value="Cliente 1" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center w-50">PRODUCTO</th>
                                <th class="text-center">PRECIO</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            <tr class="text-center">
                                <td>324</td>
                                <td>Producto 1</td>
                                <td>20</td>
                            </tr>
                            <tr class="text-center">
                                <td>324</td>
                                <td>Producto 2</td>
                                <td>10</td>
                            </tr>
                            <tr class="text-center">
                                <td>324</td>
                                <td>Producto 4</td>
                                <td>60</td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td class="text-right"><b>TOTAL</b></td>
                                    <td><span id="total">90</span> Bs</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('ventas')}}" class="btn btn-warning">Atras</a>

                </div>
            </div>
        </div>
    </div>
@endsection
