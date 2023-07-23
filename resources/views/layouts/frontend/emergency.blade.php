
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Secure Me</h1>
                <h6 data-aos="fade-up" data-aos-delay="400">Experience Safety and Support Like Never Before - Join Secure Me Today!</h6>
                <h2 data-aos="fade-up" data-aos-delay="400">Click the button for emergancy alert message</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <form action="{{ route('emergency-alert') }}" method="post">@csrf
                            @if (!isset(auth()->user()->profile->f_mobile_no))
                              <input type="number" class="form-control my-1 w-50" name="relative_phone" id="phone_number" placeholder="Relatives Phone Number" value="8801" />
                            @else
                              <input type="hidden" class="form-control my-1 w-50" name="relative_phone" value="88{{ auth()->user()->profile->f_mobile_no }}" />
                              <input type="hidden" name="police_station" value="{{ isset(auth()->user()->profile->police_station_id) ? auth()->user()->profile->police_station_id : null }}">
                            @endif
                            <input type="hidden" name="url" id="url">
                            <button type="submit" id="emergencyAlert"  class="btn btn-danger mt-2 scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <i class="far fa-bell"></i>
                                <span> &nbsp; Emergency Alert</span>
                            </button>
                        </form>
                        @if(session()->has('success'))
                        <div class="alert alert-success message">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('') }}assets/frontend/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    
</section>
@push('js')
    <script>
        navigator.geolocation.getCurrentPosition(function(location) {
            let latitude = location.coords.latitude;
            let longitude = location.coords.longitude;
            let accuracy = location.coords.accuracy;

            // let url =  'https://secureme/locations/' + latitude + '/' + longitude+ '/' + accuracy ;
            // let text = "Location";
            // let result = text.link(`https://);
            let result = `www.secureme.pm-devs.xyz/locations/${latitude}/${longitude}/${accuracy}`;

            $('#url').val(result);

        });
    </script>
@endpush