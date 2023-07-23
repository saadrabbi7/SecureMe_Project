<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ (Request::segment(1) == null) ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          @if (Request::segment(1) == null)
            <li><a class="nav-link scrollto" href="#values">Services</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>          
          @else
            <li><a class="nav-link scrollto" href="{{ url('/') }}">Services</a></li>
            <li><a class="nav-link scrollto" href="{{ url('/') }}">Team</a></li>
          @endif
          <li><a class="nav-link scrollto {{ (Request::segment(1) == 'contact') ? 'active' : '' }}" href="{{ url('/contact-us') }}">Contact Us</a></li>
          <li><a class="nav-link scrollto {{ (Request::segment(1) == 'law') ? 'active' : '' }}" href="{{ url('/law') }}">Law</a></li>
          @guest
            @if (Route::has('login'))
              <li>
                <a class="nav-link " href="{{ url('/login') }}">Login</a>
              </li>
            @endif
            @if (Route::has('register'))
              <li>
                  <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
          {{--  @dd(auth()->user())  --}}
            <li>

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @isset(auth()->user()->profile->picture)
                      @if (auth()->user()->profile->picture != null)
                          <img src="{{ asset('profile-images/'.auth()->user()->profile->picture) }}" width="30px" height="30px" style="margin-right:5px; border-radius: 100%" />
                      @endif
                  @endisset
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if (auth()->user()->is_admin == 1)
                      <a href="{{ url('/dashboard') }}" class="dropdown-item">
                        <span style="margin-right:20px;"><i class="bi bi-gear" style="font-size: 17px; margin-left: -5px; "></i>  Control Panel</span>
                      </a>
                    @endif  
                    <a href="{{ url('/profile') }}" class="dropdown-item">
                      <span><i class="bi bi-person" style="font-size: 17px; margin-left: -5px;"></i>  Profile</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <span><i class="bi bi-box-arrow-right" style="font-size: 17px; margin-left: -5px;"></i> {{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
          @endguest 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>