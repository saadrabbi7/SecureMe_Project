@extends('frontend-master')
@section('content')
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p class="text-danger">Danger Zone</p>
            </header>
            <div class="row">
                <div class="col-md-12 entries">
                    {{-- <article class="entry entry-single">
                        <fieldset>
                            <legend>Location Status</legend>
                            <div class="row">
                                @if(isset($locationData) && $locationData != null)
                                <div class="col-sm-2">
                                    <p>{{ ($locationData->countryName != null) ? "Country Name :" : "" }}</p>
                                    <p>{{ ($locationData->regionName != null) ? "Division :" : "" }}</p>
                                    <p>{{ ($locationData->cityName != null) ? "City Name :" : "" }}</p>
                                </div>
                                <div class="col-sm-10">
                                    <p><strong>{{ ($locationData->countryName != null) ? $locationData->countryName : "" }}</strong></p>
                                    <p><strong>{{ ($locationData->regionName != null) ? $locationData->regionName : "" }}</strong></p>
                                    <p><strong>{{ ($locationData->cityName != null) ? $locationData->cityName : "" }}</strong></p>
                                </div>
                                @else
                                    <small class="text-secondary">IP Address Not Found</small>
                                @endif
                            </div>
                        </fieldset>
                    </article> --}}
                    <div id="map" class="img-thumbnail shadow-lg p-3 mb-5 bg-white rounded"></div>
                </div><!-- End blog entries list -->
            </div>
        </div>
    </section>
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <style>
            #map {
                width: 100%;
                height: 80vh;
            }
        </style>
    @endpush
    @push('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let latitude = `{{ $latitude }}`;
        let longitude = `{{ $longitude }}`;
        let accuracy = `{{ $accuracy }}`;

        var latlng = new L.LatLng(latitude, longitude);

        var map = L.map('map').setView(latlng, 15);
        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=ha32QM3NC5s4H3Xyq5hJ', {
            attribution : '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        }).addTo(map);

        var marker = L.marker(latlng).addTo(map);
        var circle = L.circle(latlng, {radius: accuracy, color: 'red'});

        var featureGroup = L.featureGroup([marker, circle]).addTo(map);
    
    </script>
    @endpush
@endsection
