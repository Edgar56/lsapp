@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <body>
                    <div class="container">
                        <br/>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div style="width: 500px; height: 500px;">
                            {!! Mapper::render() !!}
                        </div>
                        <table id="js_content" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>DeviceID</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Destination</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($addresses as $key => $address)

                                <tr>

                                    <td>{{$address['deviceId']}}</td>
                                    <td>{{$address['longitude']}}</td>
                                    <td >{{$address['latitude']}}</td>
                                    <td>{{$address['destination']}}</td>
                                    <td>
                                        <a onclick="reply_click(this.id)" class="btn btn-danger">Find</a>
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {{$addresses ->links()}}
                    </div>
                    </body>

                </div>
            </div>
        </div>
    </div>
    <script>

        var position = new google.maps.LatLng(54.674724, 25.267224);
        var mapOptions_0 = {
            center: position,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI:  false ,
            scrollwheel:  true ,
            zoomControl:  true ,
            mapTypeControl:  true ,
            scaleControl:  false ,
            streetViewControl:  true ,
            rotateControl:  false ,
            fullscreenControl:  true
        };
        var clone = new google.maps.Map(document.getElementById('map-canvas-0'), mapOptions_0)



        function reply_click(id)
        {
            addmarker();
            google.maps.event.trigger(clone, 'resize');
        }

        console.log(clone);

        function addmarker()
        {
            var bounds = new google.maps.LatLngBounds();
            var latlng = new google.maps.LatLng(54.674724, 25.267224);
            //var markers = [];

            //var markerPosition_0 = new google.maps.LatLng(3.152109, 101.666041);

            var marker_0 = new google.maps.Marker({
                position: latlng,


                title: "",
                label: "",
                animation:  '' ,
                icon:
                    ""
            });

            bounds.extend(marker_0.position);

            marker_0.setMap(clone);
            markers.push(marker_0);
        }

    </script>
@endsection

