@extends('frontend-master')
@section('content')
<section id="contact" class="contact mt-5">
    <div class="container " data-aos="fade-up">

      @if(session()->has('success'))
        <div class="alert alert-success message">
            {{ session()->get('success') }}
        </div>
      @endif
      <header class="section-header">
        <p>Contact Us</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@secureme.com<br>support@secureme.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+8801-000-0000<br>+8801-000-0000<br>+8801-000-0000</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="{{ route('contact.store') }}" method="post" >
            @csrf
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>

              {{-- <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div> --}}

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12">
                <button type="submit" class="float-left btn btn-primary">Send Message</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section>

@endsection

@push('js')
  <script>
    $("document").ready(function(){
    setTimeout(function(){
        $(".message").remove();
       
    }, 3000 ); 

});
    </script>
@endpush