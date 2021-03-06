@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo Servicio
                    </h3>
                    <form method="POST" action="{{url('ventas/guardarServicio')}}" autocomplete="off">
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
                                    <select name="cliente_id" class="form-control">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Empleado</label>
                                    <select name="empleado_id" class="form-control">
                                        @foreach($empleados as $empleado)
                                            <option value="{{$empleado->id}}">{{$empleado->nombre}} {{$empleado->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Total Bs</label>
                                    <input class="form-control" readonly value="0" id="tt">
                                    <input class="form-control" name="total" hidden id="tt2">
                                </div>
                            </div>


                        </div>



                        <hr>
                        <h4>Servicios</h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Detalle servicio"type="text" id="nombreServicio">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Precio" min="0" type="number" step="0.01" id="precioS">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button id="btn_agregarS" type="button" onclick="agregarS()"  class="btn btn-success btn-sm btn-block">
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
                                    <th class="text-center w-50">SERVICIO</th>
                                    <th class="text-center">PRECIO BS</th>
                                </tr>
                                </thead>
                                <tbody id="detalleS">
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td><b>TOTAL</b></td>
                                    <td><span id="totalS">0</span> Bs</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>









                        <hr>
                        <h4>Productos</h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select class="form-control selectpicker" data-live-search="true" id="selectorProducto" >
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Precio" min="0" type="number" step="0.01" id="precio">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Cantidad" min="0" type="number" id="cantidad">
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
                                    <th class="text-center w-50">PRODUCTO</th>
                                    <th class="text-center">PRECIO BS</th>
                                    <th class="text-center">CANTIDAD</th>
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
                                    <td><b>TOTAL</b></td>
                                    <td><span id="total">0</span> Bs</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>

                        <a href="{{url('ventas/ventas')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" id="guardar" class="btn btn-info">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endpush
    @push('scripts')
        <script>
            $(document).ready(
                function () {
                    evaluar();
                }
            );

            var cont = 0;
            var cantidad = 0;
            var precio = 0;
            var total = 0;
            var subtotal = [];

            var contS = 0;
            var nombreS = 0;
            var precioS = [];
            var totalS = 0;
            var totalV = 0;

            function agregar() {

                cantidad = $('#cantidad').val();

                if(cont>=0 && cantidad != null && cantidad > 0) {
                    precio = parseFloat($('#precio').val()).toFixed(2);
                    subtotal[cont] = (cantidad * precio).toFixed(2);

                    totalV = parseFloat(totalV) + parseFloat(subtotal[cont]);
                    total = parseFloat(total) + parseFloat(subtotal[cont]);
                    total = parseFloat(total).toFixed(2);
                    idProducto = $('#selectorProducto').val();
                    nombreProducto = $('#selectorProducto option:selected').text();
                    var fila =
                        '<tr  class="text-center" id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input name="idProductoT[]" hidden value="'+idProducto+'">'+
                        nombreProducto +
                        '</td>' +

                        '<td>' +
                        '   <input hidden name="precioT[]" value="'+precio+'">'+
                        precio +
                        '</td>' +
                        '<td>' +
                        '   <input hidden name="cantidadT[]" value="'+cantidad+'">'+
                        cantidad +
                        '</td>' +
                        '<td>' +
                        subtotal[cont] +
                        '</td>' +
                        '</tr>';
                    cont++;
                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles
                    $("#total").html(totalV);

                }
                $('#cantidad').val("");
                $('#precio').val("");
                $('#tt').val(total);
                $('#tt2').val(total);
                evaluar();
            }

            function agregarS() {

                nombreS = $('#nombreServicio').val();
                precioS[contS] = parseFloat($('#precioS').val()).toFixed(2);
                if(contS>=0 && precioS[contS] != null && precioS[contS] > 0) {
                    totalS = parseFloat(totalS) + parseFloat(precioS[contS]);
                    total = parseFloat(total) + parseFloat(precioS[contS]);
                    var filaS =
                        '<tr  class="text-center" id="filaS' + contS + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitarS(' + contS + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input name="nombresT[]" hidden value="'+nombreS+'">'+
                        nombreS +
                        '</td>' +

                        '<td>' +
                        '   <input hidden name="preciosST[]" value="'+precioS[contS]+'">'+
                        precioS[contS] +
                        '</td>' +
                        '</tr>';
                    contS++;
                    $("#detalleS").append(filaS); // sirve para anhadir una fila a los detalleS
                    $("#totalS").html(totalS);

                }
                $('#nombreServicio').val("");
                $('#precioS').val("");
                $('#tt').val(total);
                $('#tt2').val(total);
                evaluar();
            }

            function quitar(index){
                total = total - subtotal[index];
                totalV = totalV - subtotal[index];
                $("#total").html(totalV);
                $('#tt').val(total);
                $('#tt2').val(total);
                cont--;
                $("#fila" + index).remove();
                evaluar();
            }

            function quitarS(index){
                totalS = totalS - precioS[index];
                total = total - precioS[index];
                $("#totalS").html(totalS);
                $('#tt').val(total);
                $('#tt2').val(total);
                contS--;
                $("#filaS" + index).remove();
                evaluar();

            }

            function evaluar(){
                if (cont > 0 || contS > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }


        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    @endpush
@endsection