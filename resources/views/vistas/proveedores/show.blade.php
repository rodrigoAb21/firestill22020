@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver proveedor
                    </h3>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Nombre</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="Proveedor 1"
                                       name="contacto">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>NIT</label>
                                <input
                                        value="789456213"
                                        type="text"
                                        class="form-control"
                                        readonly
                                        name="celular">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input readonly
                                       type="email"
                                       value="proveedor1@gmail.com"
                                       class="form-control"
                                       name="contacto">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input readonly
                                        type="text"
                                       value="Direccion 1"
                                        class="form-control"
                                        name="tel_empresa">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="3505050"
                                        name="tel_empresa">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Informacion</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="Informacion proveedor 1"
                                        name="tel_empresa">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h4>Datos Bancarios</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Titular</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="Titular Proveedor 1"
                                       name="contacto">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Banco</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="Banco Union"
                                        name="celular">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Sucursal</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="Santa Cruz"
                                       name="celular">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nro Cuenta</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="3124565"
                                       name="celular">
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Moneda</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="Boliviano"
                                       name="celular">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Tipo Identificación</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="NIT"
                                        name="celular">
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nro Indentificacion</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="789456213"
                                       name="celular">
                            </div>
                        </div>



                    </div>
                    <a href="{{url('proveedores')}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
