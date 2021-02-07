@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo empleado
                    </h3>

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
                                    <label>Apellido</label>
                                    <input
                                            type="text"
                                           class="form-control"

                                           name="celular">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input
                                            type="text"
                                            class="form-control"

                                            name="tel_empresa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input required
                                           type="text"
                                           class="form-control"

                                           name="empresa">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input
                                           type="text"
                                           class="form-control"

                                           name="tel_empresa">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input
                                           type="text"
                                           class="form-control"

                                           name="tel_empresa">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('empleados')}}" class="btn btn-warning">Atras</a>
                        <a href="{{url('empleados')}}" class="btn btn-success">Guardar</a>


                </div>
            </div>
        </div>
    </div>
@endsection
