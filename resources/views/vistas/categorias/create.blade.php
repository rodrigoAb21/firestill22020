@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nueva categoria
                    </h3>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="contacto">
                                </div>
                            </div>
                            
                        </div>
                        <a href="{{url('categorias')}}" class="btn btn-warning">Atras</a>
                        <a href="{{url('categorias')}}" class="btn btn-success">Guardar</a>


                </div>
            </div>
        </div>
    </div>
@endsection
