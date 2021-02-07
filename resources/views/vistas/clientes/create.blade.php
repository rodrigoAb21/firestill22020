@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo cliente
                    </h3>

                    <h4>Datos Empresa</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="contacto">
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT/CI</label>
                                    <input required
                                           type="text"
                                           class="form-control"

                                           name="empresa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input
                                           type="text"
                                           class="form-control"

                                           name="tel_empresa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required
                                           type="email"
                                           class="form-control"

                                           name="empresa">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input required
                                           type="text"
                                           class="form-control"
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
                                <input required
                                       type="text"
                                       class="form-control"
                                       name="contacto">
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cargo</label>
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
                    </div>
                        <a href="{{url('clientes')}}" class="btn btn-warning">Atras</a>
                        <a href="{{url('clientes')}}" class="btn btn-success">Guardar</a>


                </div>
            </div>
        </div>
    </div>
@endsection
