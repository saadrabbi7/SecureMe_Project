<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">

    <link href="{{ asset('') }}assets/frontend/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap3-theme.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Secure Me | Login</title>
</head>

<body>
    <!-- Main Content -->
    <div class="container-fluid" style="margin-top: 5rem">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="" style="max-height: 120px;">
                    </a>
                </span>
                <h4 class="company_title">
                    {{--  Your Company Logo  --}}
                </h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="text-uppercase"><b>Log In</b></h2>
                    </div>
                    <div class="row">
                        <form class="form-group" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <input type="text" name="phone" id="phone" class="form__input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                    placeholder="Phone Number">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input type="password" name="password" id="password" class="form__input @error('password') is-invalid @enderror" value="{{ old('password') }}" required autocomplete="current-password" autofocus
                                    placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="row">
                                <input type="checkbox" name="remember_me" id="remember_me" class="___class_+?18___">
                                <label for="remember_me">Remember Me!</label>
                            </div>
                            <div class="row">
                                <input type="submit" value="Submit" class="btn">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p>Don't have an account? <a href="{{ url('/register') }}"><em>Sign Up Here</em></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
