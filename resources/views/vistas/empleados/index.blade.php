@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-id-card"></i> Empleados
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('empleados/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">APELLIDO</th>
                                <th class="text-center">CI</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empleados as $empleado)
                                <tr class="text-center">
                                    <td >{{$empleado->id}}</td>
                                    <td >{{$empleado->nombre}}</td>
                                    <td >{{$empleado->apellido}}</td>
                                    <td >{{$empleado->carnet}}</td>
                                    <td >{{$empleado->telefono}}</td>

                                    <td>
                                        <a href="{{url('empleados/'.$empleado->id)}}">
                                            <button class="btn btn-secondary">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('empleados/'.$empleado->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$empleado -> nombre}}', '{{url('empleados/'.$empleado -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$empleados->links('pagination.default')}}
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

    @endpush()
@endsection
