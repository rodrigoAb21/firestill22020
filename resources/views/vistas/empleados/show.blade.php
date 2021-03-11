@extends('layouts.index')
@section('contenido')
    <!--
    *************************************************************************
     * Nombre........: create
     * Tipo..........: Vista
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
    -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar trabajador
                    </h3>
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->nombre}}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input readonly
                                            type="text"
                                           class="form-control"
                                            value="{{$empleado->apellido}}"
                                           name="apellido">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$empleado->direccion}}"
                                            name="direccion">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input  readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->carnet}}"
                                           name="carnet">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->telefono}}"
                                           name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->email}}"
                                           name="email">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('empleados')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
