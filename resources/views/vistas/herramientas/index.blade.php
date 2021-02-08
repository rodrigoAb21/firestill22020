@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-tools"></i> Herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/create')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TALLER</th>
                                <th class="text-center">ASIGNADAS</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($herramientas as $herramienta)
                                <tr class="text-center">
                                    <td>{{$herramienta->id}}</td>
                                    <td>{{$herramienta->nombre}}</td>
                                    <td>{{$herramienta->cantidad_taller}}</td>
                                    <td>{{$herramienta->cantidad_asignada}}</td>
                                    <td>{{$herramienta->cantidad_total}}</td>
                                    <td>
                                        <a href="{{url('herramientas/'.$herramienta->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-dark">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$herramienta -> nombre}}', '{{url('herramientas/'.$herramienta -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$herramientas->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('vistas.modal')
    @include('vistas.baja')
    @push('scripts')
        <script>

            function modalBaja() {
                $('#modalBaja').modal('show');
            }

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Herramienta");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la herramienta?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
