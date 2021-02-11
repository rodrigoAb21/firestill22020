@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo contrato
                    </h3>
                    <form method="POST" action="{{url('empleados')}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select name="tipo" class="form-control">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Representante Firestill</label>
                                    <select name="tipo" class="form-control">
                                        @foreach($empleados as $empleado)
                                            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha inicio</label>
                                    <input required
                                           type="date"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha fin</label>
                                    <input required
                                           type="date"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           class="form-control"
                                           name="fecha_fin">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Documento</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            name="documento">
                                </div>
                            </div>

                        </div>
                        <a href="{{url('empleados')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
