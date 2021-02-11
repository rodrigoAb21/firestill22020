@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar contrato
                        <div class="float-right">
                            <a class="btn btn-outline-warning" href="{{url('imonitoreo/editarContrato/'.$contrato->id)}}">
                                <i class="fa fa-pen"></i>  Editar
                            </a>
                        </div>
                    </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <input type="text" readonly class="form-control" value="{{$contrato->cliente->nombre_empresa}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Representante Firestill</label>
                                    <input type="text" readonly class="form-control" value="{{$contrato->empleado->nombre}} {{$contrato->empleado->apellido}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha inicio</label>
                                    <input readonly
                                           type="date"
                                           value="{{$contrato->fecha_inicio}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha fin</label>
                                    <input readonly
                                           type="date"
                                           value="{{$contrato->fecha_fin}}"
                                           class="form-control"
                                           name="fecha_fin">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Periodo (Mes)</label>
                                    <input readonly
                                           type="number"
                                           value="{{$contrato->periodo}}"
                                           class="form-control"
                                           name="periodo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Documento</label><br>
                                    <a class="btn btn-secondary" target="_blank" href="{{asset('contrato/'.$contrato->documento)}}">Ver Documento</a>
                                </div>
                            </div>

                        </div>
                        <a href="{{url('imonitoreo/listaContratos')}}" class="btn btn-warning">Atras</a>

                </div>
            </div>
        </div>
    </div>
@endsection
