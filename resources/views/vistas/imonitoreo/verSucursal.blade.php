@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Sucursal: {{$sucursal->id}}
                    </h3>
                    <form method="POST" action="{{url('imonitoreo/actualizarSucursal/'.$sucursal -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           value="{{$sucursal->nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input required
                                           type="text"
                                           value="{{$sucursal->direccion}}"
                                           class="form-control"
                                           name="direccion">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/verContrato/'.$sucursal->contrato_id)}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Equipos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevoEquipo')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">TIPO</th>
                                    <th class="text-center">MARCA</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sucursal->equipos as $equipo)
                                    <tr class="text-center">
                                        <td>{{$equipo->id}}</td>
                                        <td>{{$equipo->tipo->nombre}}</td>
                                        <td>{{$equipo->marca->nombre}}</td>
                                        <td>
                                            <a href="{{url('imonitoreo/equipo/'.$equipo->id)}}">
                                                <button class="btn btn-secondary">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$equipo -> id}}', '{{url('imonitoreo/eliminarEquipo/'.$sucursal -> id)}}')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
            </div>
        </div>
    </div>
@endsection

