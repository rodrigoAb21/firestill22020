@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo empleado
                    </h3>
                    <form method="POST" action="{{url('empleados')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input
                                            type="text"
                                           class="form-control"
                                           name="apellido">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="direccion">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="carnet">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input
                                           type="email"
                                           class="form-control"
                                           name="email">
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
