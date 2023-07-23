<section id="values" class="values">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <h2>Our Services</h2>
      </header>

      <div class="row">

        <div class="col-lg-4 mt-lg-0 d-none" id="emergency_alert">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            {{-- <a href="{{ url('/services/police-stations') }}"> --}}
              <img src="{{ asset('') }}assets/frontend/img/emer.jpg" class="img-fluid" alt="" width="250">
              <form action="{{ route('emergency-alert') }}" method="post" class="">@csrf
                  @if (!isset(auth()->user()->profile->f_mobile_no))
                    <input type="number" class="form-control my-1 w-75 d-inline-flex align-items-center justify-content-center align-self-center" name="relative_phone" id="phone_number" placeholder="Relatives Phone Number" value="8801" />
                  @else
                    <input type="hidden" class="form-control my-1 w-75" name="relative_phone" value="88{{ auth()->user()->profile->f_mobile_no }}" />
                    <input type="hidden" name="police_station" value="{{ isset(auth()->user()->profile->police_station_id) ? auth()->user()->profile->police_station_id : null }}">
                    @endif
                  <input type="hidden" name="url" id="p">
                  <button type="submit" id="emergencyAlert" class="btn btn-danger mt-2 scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                      <i class="far fa-bell"></i>
                      <span> &nbsp; Emergency Alert</span>
                  </button>
              </form>
              {{-- <h3>Emergency<br> Alert</h3> --}}
            {{-- </a> --}}
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/services/police-stations') }}">
              <img src="{{ asset('') }}assets/frontend/img/police.png" class="img-fluid" alt="" width="250">
              <h3>Nearby Police <br> Station</h3>
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/services/ambulances') }}">
              <img src="{{ asset('') }}assets/frontend/img/ambulance.png" class="img-fluid" alt="" width="250">
              <h3>Ambulance</h3>
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/services/blood-bank') }}">
              <img src="{{ asset('') }}assets/frontend/img/blood-bank.jpg" class="img-fluid" alt="" width="250">
              <h3>Blood Bank</h3>
            </a>
          </div>
        </div>

      </div>

      <div class="row mt-3">

        <div class="col-lg-4">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/services/location') }}">
              <img src="{{ asset('') }}assets/frontend/img/locations.png" class="img-fluid" alt="" width="250">
              <h3>Locations</h3>
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/services/picture-records') }}">
              <img src="{{ asset('') }}assets/frontend/img/picture-record.png" class="img-fluid" alt="" width="200">
              <h3>Picture Record</h3>
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ url('/law') }}">
              <img src="{{ asset('') }}assets/frontend/img/law.png" class="img-fluid" alt="" width="200">
              <h3>About LAW</h3>
            </a>
          </div>
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

          $('#p').val(result);

      });
  </script>
@endpush