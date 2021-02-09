@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar empleado
                    </h3>
                    <form method="POST" action="{{url('empleados/'.$empleado -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->nombre}}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input
                                            type="text"
                                           class="form-control"
                                            value="{{$empleado->apellido}}"
                                           name="apellido">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$empleado->direccion}}"
                                            name="direccion">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="tipo" class="form-control">
                                        @foreach($tipos as $tipo)
                                            @if($tipo == $empleado->tipo)
                                                <option selected value="{{$tipo}}">{{$tipo}}</option>
                                            @else
                                                <option value="{{$tipo}}">{{$tipo}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->carnet}}"
                                           name="carnet">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$empleado->telefono}}"
                                           name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input
                                           type="email"
                                           class="form-control"
                                           value="{{$empleado->email}}"
                                           name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input
                                           type="password"
                                           class="form-control"
                                           value="{{$empleado->email}}"
                                           name="password">
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
