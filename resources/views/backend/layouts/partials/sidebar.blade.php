<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">My Account</li>

                <li>
                    <a href="{{ url('/profile') }}" class="waves-effect">
                        <i class="fas fa-user"></i>
                        <span class="ml-3"> <b>Profile</b> </span>
                    </a>
                </li>
                @isset(auth()->user()->is_admin)
                    
                    @if (auth()->user()->is_admin == 1)
                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="{{ url('/dashboard') }}" class="waves-effect">
                            <i class="fas fa-home"></i>
                            <span class="ml-3"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span class="ml-3"> Users</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="{{ Route::has('locations.index') ? route('locations.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-map-marker"></i>
                            <span class="ml-3"> Location </span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ Route::has('police-stations.index') ? route('police-stations.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-arrows-alt"></i>
                            <span class="ml-3"> Police Station </span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ Route::has('ambulances.index') ? route('ambulances.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-ambulance"></i>
                            <span class="ml-3"> Ambulance </span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ Route::has('blood-banks.index') ? route('blood-banks.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-tint"></i>
                            <span class="ml-3"> Blood Bank </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('picture-records.index') ? route('picture-records.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-camera"></i>
                            <span class="ml-3"> Picture Records </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route::has('contact.index') ? route('contact.index') : '#' }}" class="waves-effect">
                            <i class="fa fa-phone"></i>
                            <span class="ml-3"> Contact Us </span>
                        </a>
                    </li>
                    @endif
                
                @endisset
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
