<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">

    <link href="{{ asset('') }}assets/frontend/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap3-theme.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Secure Me | Sign Up</title>
    <style>
        .form__input {
            margin: 0.5rem;
            margin-left: 1rem;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="" style="max-height: 120px;">
                    </a>
                </span>
                {{-- <h4 class="company_title">Your Company Logo</h4> --}}
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="text-uppercase"><b>Sign Up</b></h2>
                    </div>
                    <div class="row">
                        <form control="" class="form-group" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <input type="text" name="name" id="name" class="form__input"
                                    placeholder="Name" required>
                                @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <input type="tel" name="phone" id="phone" class="form__input"
                                    placeholder="Phone Number" required>
                                @error('phone')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <input type="email" name="email" id="email" class="form__input" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <select class="form__input" id="blood_group" name="blood_group">
                                        <option value="">Select Blood Group</option>
                                        @isset($bloodGroups)
                                            @foreach ($bloodGroups as $bloodGroup)
                                            <option value="{{ $bloodGroup }}">{{ $bloodGroup }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                  </div>
                                
                                @error('blood_group')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <input type="password" name="password" id="password" class="form__input"
                                    placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <input type="password" name="password_confirmation" id="password-confirm" class="form__input"
                                    placeholder="Password Confirmation"  required autocomplete="new-password">
                            </div>
                            <div class="row">
                                <input type="submit" value="Sign Up" class="btn">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p>Already have an account ! <a href="{{ url('/login') }}"><em>Login</em></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
