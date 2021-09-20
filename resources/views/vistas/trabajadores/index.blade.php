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
                    <h2 class="pb-2">
                        <i class="fa fa-id-card"></i> Trabajadores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('trabajadores/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>
                    <form id="search-trabajador">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead >
                            <tr>
                                <th  class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">APELLIDOS</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trabajadores as $empleado)
                                <tr class="text-center">
                                    <td >{{$empleado->id}}</td>
                                    <td >{{$empleado->nombre}}</td>
                                    <td >{{$empleado->apellido}}</td>
                                    <td >{{$empleado->tipo}}</td>
                                    <td >{{$empleado->telefono}}</td>

                                    <td>
                                        <a href="{{url('trabajadores/'.$empleado->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>
                                        <a href="{{url('trabajadores/'.$empleado->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                Editar
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger"
                                                onclick="modalEliminar('{{$empleado -> nombre}}', '{{url('trabajadores/'.$empleado -> id)}}')">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$trabajadores->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Empleado");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al empleado: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>

        <script>
            $(document).ready(function (){
                console.log("funcionaa");
                $('#search-trabajador').keyup(function (e){
                    console.log('ok');
                    let search = $('#search-trabajador').val();
                    $.ajax({
                        url:'',
                        type:'POST',
                        data:{search},
                        success:function (response){
                            let trabajadores=JSON.parse(response);
                            console.log(trabajadores);
                        }
                    })
                })
            });
        </script>

    @endpush()
@endsection
