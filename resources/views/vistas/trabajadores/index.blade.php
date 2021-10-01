
@extends('layouts.index')
@push('arriba')
    <meta id="token" name="_token" content="{{ csrf_token() }}">
@endpush
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
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" id="tr">
                            <div class="input-group-append">
                                <button  class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div id="tabla-trabajador">
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

                $("document").ready(function(){
                $('#tr').keyup(function (e){
                    e.preventDefault();
                    let name = $("#tr").val();
                    let _token   = $('meta[name="csrf-token"]').attr('content');
                    console.log(name);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "trabajadores/search",
                        type:"POST",
                        data:{
                            name:name,
                            _token: _token,
                            nro: 1
                        },
                        success:function(response) {
                           console.log(response);
                            if (response) {
                                $('.success').text(response.success);
                                let trabajadores=response.success.data;
                                let textoG="";
                                for (let cont in trabajadores) {
                                    let trabajador = trabajadores[cont];
                                    textoG+='<tr class="text-center">'+
                                            '<td >'+trabajador.id+'</td>'+
                                            '<td >'+trabajador.nombre+'</td>'+
                                            '<td >'+trabajador.apellido+'</td>'+
                                            '<td >'+trabajador.tipo+'</td>'+
                                            '<td >'+trabajador.telefono+'</td>'+
                                            '<td>'+

                                            '</td>'+
                                        '</tr>';
                                }
                                let nuevaTabla='<div class="table-responsive">' +
                                               '<table class="table table-hover table-bordered color-table info-table">'+
                                               '<thead>'+
                                               '<tr>'+
                                               '<th  class="text-center">COD</th>'+
                                               '<th class="text-center">NOMBRE</th>'+
                                               '<th class="text-center">APELLIDOS</th>'+
                                               '<th class="text-center">TIPO</th>'+
                                               '<th class="text-center">TELEFONO</th>'+
                                               '<th class="text-center">OPC</th>'+
                                               '</tr>'+
                                               '</thead>'+
                                               '<tbody>'+
                                               textoG+
                                               '</tbody>'+
                                               '<nav class="mr-0 ml-auto">'+
                                               '<ul class="pagination justify-content-end">'+
                                               //'<li class="page-item disabled"><span class="page-link">ANT</span></li>'+
                                               '<li class="page-item active"><a class="page-link"  onclick=verPagina(1)>1</a></li>'+
                                               /*
                                               '<li class="page-item"><a class="page-link" href="trabajadores/search">2</a></li>'+
                                               '<li class="page-item"><a class="page-link" href="trabajadores/search">3</a></li>'+
                                               '<li class="page-item disabled"><span>...</span></li>'+
                                               '<li class="page-item"><a class="page-link" href="trabajadores/search">11</a></li>'+
                                               '<li class="page-item"><a class="page-link" href="trabajadores/search">12</a></li>'+
                                               '<li class="page-item"><a class="page-link" href="trabajadores/search" rel="next">SIG</a></li>'+
                                                */
                                               '</ul>'+
                                               '</nav>'+
                                               '</table>'+
                                               '</div>';
                                $('#tabla-trabajador').empty().append(nuevaTabla);
                            }
                        }
                    });
                })


                });
        </script>
        <script>
            function verPagina(nro) {
            console.log("sdsad :"+nro);
                let _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "trabajadores/search",
                    type:"POST",
                    data:{
                        name:name,
                        _token: _token,
                        nro: nro
                    },
                    success:function(response) {
                        console.log(response);
                        if (response) {
                            $('.success').text(response.success);
                            let trabajadores=response.success.data;
                            let textoG="";
                            for (let cont in trabajadores) {
                                let trabajador = trabajadores[cont];
                                textoG+='<tr class="text-center">'+
                                    '<td >'+trabajador.id+'</td>'+
                                    '<td >'+trabajador.nombre+'</td>'+
                                    '<td >'+trabajador.apellido+'</td>'+
                                    '<td >'+trabajador.tipo+'</td>'+
                                    '<td >'+trabajador.telefono+'</td>'+
                                    '<td>'+

                                    '</td>'+
                                    '</tr>';
                            }
                            let nuevaTabla='<div class="table-responsive">' +
                                '<table class="table table-hover table-bordered color-table info-table">'+
                                '<thead>'+
                                '<tr>'+
                                '<th  class="text-center">COD</th>'+
                                '<th class="text-center">NOMBRE</th>'+
                                '<th class="text-center">APELLIDOS</th>'+
                                '<th class="text-center">TIPO</th>'+
                                '<th class="text-center">TELEFONO</th>'+
                                '<th class="text-center">OPC</th>'+
                                '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                textoG+
                                '</tbody>'+
                                '<nav class="mr-0 ml-auto">'+
                                '<ul class="pagination justify-content-end">'+
                                //'<li class="page-item disabled"><span class="page-link">ANT</span></li>'+
                                '<li class="page-item active"><a class="page-link"  onclick=verPagina(1)>1</a></li>'+
                                /*
                                '<li class="page-item"><a class="page-link" href="trabajadores/search">2</a></li>'+
                                '<li class="page-item"><a class="page-link" href="trabajadores/search">3</a></li>'+
                                '<li class="page-item disabled"><span>...</span></li>'+
                                '<li class="page-item"><a class="page-link" href="trabajadores/search">11</a></li>'+
                                '<li class="page-item"><a class="page-link" href="trabajadores/search">12</a></li>'+
                                '<li class="page-item"><a class="page-link" href="trabajadores/search" rel="next">SIG</a></li>'+
                                 */
                                '</ul>'+
                                '</nav>'+
                                '</table>'+
                                '</div>';
                            $('#tabla-trabajador').empty().append(nuevaTabla);
                        }
                    }
                });
            }
        </script>

    @endpush()
@endsection
