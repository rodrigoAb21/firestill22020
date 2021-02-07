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
                                <label>Tienda</label>
                                <input required
                                       type="text"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select class="form-control selectpicker" data-live-search="true" id="selectorInsumo">
                                    <option>Herramienta 1</option>
                                    <option>Herramienta 2</option>
                                    <option>Herramienta 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Cantidad" type="number" id="cantidad">
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
                                <th class="text-right">OPC</th>
                                <th class="text-center w-50">HERRAMIENTA</th>
                                <th class="text-center">CANTIDAD</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            </tbody>
                        </table>

                    </div>

                    <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atras</a>
                    <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-info">Guardar</a>

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
                cantidad = $('#cantidad').val();
                if(cont>=0 && cantidad != null && cantidad > 0) {
                    nombreInsumo = $('#selectorInsumo option:selected').text();
                    var fila =
                        '<tr id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input class="form-control" name="ewtew" readonly value="'+nombreInsumo+'">'+
                        '</td>' +
                        '<td>' +
                        '   <input class="form-control" type="number" value="'+cantidad+'">'+
                        '</td>' +
                        '</tr>';
                    cont++;
                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles

                }
                $('#cantidad').val("");
            }

            function quitar(index){
                cont--;
                $("#fila" + index).remove();
            }


        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    @endpush
@endsection