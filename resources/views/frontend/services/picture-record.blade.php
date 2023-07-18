@extends('frontend-master')
@push('css')
<style>
  video {
      width: 320px;
      height: 240px;
      transition: all 8s ease-in-out;
      box-shadow: 5px 5px 5px rgba(121, 120, 121, 0.75);

      padding: .25rem;
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: .25rem;
      height: auto;
 }

</style>
@endpush
@section('content')
<section id="blog" class="blog mt-5">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Monitor Picture Record</p>
        </header>
      <div class="row">

        <div class="col-lg-12">
 
          <article class="entry entry-single">
            <div class="caremra d-flex justify-content-around">
              <div id="my_camera"></div>
              <div id="results" >
                <form method="POST" enctype="multipart/form-data" id="form"></form>
              </div>
            </div>
             
          </article>
        </div>

      </div>

    </div>
  </section>
  @push('js')
  <script type="text/javascript" src="{{ asset('/assets/js/webcam/webcam.min.js') }}"></script>

  <script language="JavaScript">
    const audioMsg = '{{ URL::asset('assets/js/webcam/shutter.mp3') }}';
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );

    var shutter = new Audio();
    shutter.autoplay = true;
    shutter.src = audioMsg;

    function take_snapshot() {
        // shutter.play();

        Webcam.snap( function(data_uri) {
            document.getElementById('form').innerHTML = 
            '<img src="'+data_uri+'" id="image_record" class="img-thumbnail" />';
        });
        saveSnap();
    }

    setInterval(function(){

      take_snapshot();

    }, 6000);

    function saveSnap(){

      var base64image = document.getElementById("image_record").src;

      axios.post(`{{ route('picture-records.store') }}`, {
        image: base64image
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });

    }

  </script>
  @endpush
@endsection