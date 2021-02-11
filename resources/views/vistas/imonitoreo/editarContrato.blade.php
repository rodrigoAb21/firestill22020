@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar contrato
                    </h3>
                    <form method="POST" action="{{url('imonitoreo/actualizarContrato/'.$contrato -> id)}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select name="cliente_id" class="form-control">
                                            @foreach($clientes as $cliente)
                                                @if($cliente->id == $contrato->cliente_id)
                                                    <option selected value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                                @else
                                                    <option value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Representante Firestill</label>
                                    <select name="empleado_id" class="form-control">
                                        @foreach($empleados as $empleado)
                                            @if($empleado->id == $contrato->empleado_id)
                                                <option selected value="{{$empleado->id}}">{{$empleado->nombre}}  {{$empleado->apellido}}</option>
                                            @else
                                                <option value="{{$empleado->id}}">{{$empleado->nombre}}  {{$empleado->apellido}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha inicio</label>
                                    <input required
                                           type="date"
                                           value="{{$contrato->fecha_inicio}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha fin</label>
                                    <input required
                                           type="date"
                                           value="{{$contrato->fecha_fin}}"
                                           class="form-control"
                                           name="fecha_fin">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Periodo (Mes)</label>
                                    <input required
                                           type="number"
                                           value="{{$contrato->periodo}}"
                                           class="form-control"
                                           name="periodo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Documento</label>
                                    <input  value="{{$contrato->documento}}"
                                            type="file"
                                            class="form-control"
                                            name="documento">
                                </div>
                            </div>

                        </div>
                        <a href="{{url('imonitoreo/verContrato/'.$contrato->id)}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
