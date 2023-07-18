@extends('frontend-master')
@section('content')
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Monitor Picture Record</p>
            </header>
            <div class="row">

                <div class="col-lg-12">

                    <article class="entry entry-single">

                        <div class="contentarea">
                            <h1>
                                Using Javascript to capture Photo
                            </h1>
                            <div class="camera">
                                <video id="video">Video stream not available.</video>
                            </div>
                            <div><button id="startbutton" onclick="takepicture()">Take photo</button></div>

                            <canvas id="canvas"></canvas>
                            <div class="output">
                                <img id="photo" alt="The screen capture will appear in this box.">
                            </div>
                        </div>

                    </article>
                </div>

            </div>

        </div>

    </section>
    @push('js')
        <script type="text/javascript" src="{{ asset('/assets/js/webcam/webcam.min.js') }}"></script>

        <script>
            $('#cameraInput').on('change', function(e) {
                $data = e.originalEvent.target.files[0];
                $reader = new FileReader();
                reader.onload = function(evt) {
                    $('#your_img_id').attr('src', evt.target.result);
                    reader.readAsDataUrl($data);
                }
            });

            function readFile(file) {
                var reader = new FileReader();
                reader.onload = readSuccess;

                function readSuccess(evt) {
                    document.getElementById("your_img_id").src = evt.target.result
                };
                reader.readAsDataURL(file);
            }

            document.getElementById('cameraInput').onchange = function(e) {
                readFile(e.srcElement.files[0]);
            };
        </script>
    @endpush
@endsection
