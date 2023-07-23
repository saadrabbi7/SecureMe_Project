<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        
        


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                <span class="pro-user-name ml-1">
                    {{-- {{Auth::user()->name}} --}}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                <div class="dropdown-content-body p-2">
                    <div class="row no-gutters">
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            {{--  <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             <i class="remixicon-logout-box-line"></i>
                             <span>Logout</span>
                         </a>
            
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form> --}}
            
                        </div>
                    </div>
                </div>
            </div>
        </li>
        
        <li class="nav-item">
            {{--  <a class="dropdown-item text-light" style=" margin-top:19px" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 <i class="remixicon-logout-box-line"></i>
                 <span>Logout</span>
             </a>  --}}
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ url('/') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="Secure Me" style="max-height: 50px;">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="Secure Me" style="max-height: 35px;">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
