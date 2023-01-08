@extends('layouts.master')

@section('style')
    <style>
        #map{
            height: 60vh;
        }
        .leaflet-top, .leaflet-bottom {
            z-index: 999;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var lat = -0.861453;
        var lng = 134.062042;
        var petugases = @json($petugases);

        var map = L.map('map').setView([lat, lng], 13);
        var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        petugases.forEach(petugas => {
            L.marker([petugas.lat, petugas.lng])
            .addTo(map)
            .bindPopup('<p class="text-center font-weight-bold mb-0">' + petugas.name + '</p><p class="my-0">(' + petugas.lat + ', '+ petugas.lng + ')</p>');
        });

    </script>
@endsection
