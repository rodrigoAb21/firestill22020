@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo proveedor
                    </h3>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required
                                       type="text"
                                       class="form-control"
                                       name="contacto">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>NIT</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="celular">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input required
                                       type="email"
                                       class="form-control"
                                       name="contacto">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="tel_empresa">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="tel_empresa">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Informacion</label>
                                <input
                                        type="text"
                                        class="form-control"
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
                                <input required
                                       type="text"
                                       class="form-control"
                                       name="contacto">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Banco</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="celular">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Sucursal</label>
                                <select class="form-control" name="" id="">
                                    <option value="">La Paz</option>
                                    <option value="">Oruro</option>
                                    <option value="">Potosí</option>
                                    <option value="">Cochabamba</option>
                                    <option value="">Chuquisaca</option>
                                    <option value="">Tarija</option>
                                    <option value="">Pando</option>
                                    <option value="">Beni</option>
                                    <option value="">Santa Cruz</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nro Cuenta</label>
                                <input
                                       type="text"
                                       class="form-control"

                                       name="celular">
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Moneda</label>
                                <select class="form-control" name="" id="">
                                    <option value="">Boliviano</option>
                                    <option value="">Dolar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Tipo Identificación</label>
                                <input
                                       type="text"
                                       class="form-control"

                                       name="celular">
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nro Indentificacion</label>
                                <input
                                       type="text"
                                       class="form-control"

                                       name="celular">
                            </div>
                        </div>



                    </div>
                    <a href="{{url('proveedores')}}" class="btn btn-warning">Atras</a>
                    <a href="{{url('proveedores')}}" class="btn btn-success">Guardar</a>


                </div>
            </div>
        </div>
    </div>
@endsection
