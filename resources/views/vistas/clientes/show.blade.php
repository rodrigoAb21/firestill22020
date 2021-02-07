@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver cliente
                    </h3>

                    <h4>Datos Empresa</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="Cliente 1"
                                           name="contacto">
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT/CI</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="1028703022"
                                           name="empresa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Télefono</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="3359845"
                                           name="tel_empresa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input readonly
                                           type="email"
                                           class="form-control"
                                           value="cliente1@gmail.com"
                                           name="empresa">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="Direccion 1"
                                           name="empresa">
                                </div>
                            </div>

                        </div>

                    <hr>
                    <h4>Datos Encargado</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="Encargado1"
                                       name="contacto">
                            </div>
                        </div>




                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="E. Seguridad"
                                        name="tel_empresa">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input readonly
                                        type="text"
                                        class="form-control"
                                       value="79865421"
                                        name="tel_empresa">
                            </div>
                        </div>
                    </div>
                        <a href="{{url('clientes')}}" class="btn btn-warning">Atras</a>



                </div>
            </div>
        </div>
    </div>
@endsection
