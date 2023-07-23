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
</head>

<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                    <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="" style="max-height: 120px;">
                </span>
                {{--  <h4 class="company_title">Your Company Logo</h4>  --}}
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="text-uppercase"><b>Sign Up</b></h2>
                    </div>
                    <div class="row">
                        <form control="" class="form-group">
                            <div class="row">
                                <input type="email" name="email" id="email" class="form__input"
                                    placeholder="Email">
                            </div>
                            <div class="row">
                                <input type="tel" name="phone" id="phone" class="form__input"
                                    placeholder="Phone Number">
                            </div>
                            <div class="row">
                                <input type="password" name="password" id="password" class="form__input"
                                    placeholder="Password">
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
