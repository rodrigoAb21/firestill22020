@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Equipo
                    </h3>
                        <div class="row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Nro Serie</label>
                                            <input readonly
                                                   type="number"
                                                   class="form-control"
                                                   value="{{$equipo->nro_serie}}"
                                                   name="nro_serie">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Año de fabricación</label>
                                            <input readonly
                                                   type="number"
                                                   class="form-control"
                                                   value="{{$equipo->ano_fabricacion}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->tipo->nombre}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->marca->nombre}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Capacidad</label>
                                            <input readonly
                                                   type="number"
                                                   step="0.01"
                                                   class="form-control"
                                                   value="{{$equipo->capacidad}}"
                                                   name="capacidad">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>U.Medida</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->unidad_medida}}"
                                                   name="capacidad">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Presion Min (Bar)</label>
                                            <input readonly
                                                   type="number"
                                                   step="0.01"
                                                   class="form-control"
                                                   value="{{$equipo->presion_min}}"
                                                   name="presion_min">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Presion Max (Bar)</label>
                                            <input readonly
                                                   type="number"
                                                   step="0.01"
                                                   class="form-control"
                                                   value="{{$equipo->presion_max}}"
                                                   name="presion_max">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="descripcion"
                                                      readonly
                                                      cols="30"
                                                      class="form-control"
                                                      rows="3">{{$equipo->nro_serie}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <input type="hidden" value="-17.793644" id="latitud" name="latitud">
                                    <input type="hidden" value="-63.205986" id="longitud" name="longitud">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                        <div id="map" style="width: 100%; height: 200px; background: #b4c1cd; margin-bottom: 1rem"></div>


                                    </div>

                                    <div class="pt-2 col-lg-12 col-md-12 col-sm-12">
                                        <div id="chart_div" style="width: 150px; height: 150px; display: block; margin: 0 auto;"></div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">

                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                        <input readonly type="text" class="form-control text-center" value="17 PSI">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/verSucursal/'.$equipo->sucursal_id)}}" class="btn btn-warning">Atras</a>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['gauge']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['PSI', 0],
                ]);

                var options = {
                    width: 150, height: 150,
                    redFrom: 19, redTo: 30,
                    greenFrom:11, greenTo: 19,
                    yellowColor: '#dc3912',
                    yellowFrom:0, yellowTo: 11,
                    min:0, max:30, majorTicks: ['0','5','10','15','20','25','30'],
                    minorTicks: 5, animation: {duration: 3000},
                };

                var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                chart.draw(data, options);
                data.setValue(0, 1, 17);
                chart.draw(data, options);

            }
        </script>
        <script src='https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.css' rel='stylesheet' />
    @endpush
    @push('scripts')
        <script>
            L.mapbox.accessToken = 'pk.eyJ1Ijoicm9kcmlnb2FiMjEiLCJhIjoiY2psenZmcDZpMDN5bTNrcGN4Z2s2NWtqNSJ9.bSdjQfv-28z1j4zx7ljvcg';
            var inicial = L.latLng($('#latitud').val(), $('#longitud').val());
            var map = L.mapbox.map('map')
                .setView(inicial, 15)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
            var marcador = L.marker(inicial).addTo(map);
        </script>
    @endpush
@endsection
