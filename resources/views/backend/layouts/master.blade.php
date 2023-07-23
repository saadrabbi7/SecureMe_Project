<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Secure Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
    <link href="{{ asset('') }}assets/backend/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/backend/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/backend/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/backend/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('assets/backend')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend')}}/fonts/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet">
    <link href="{{asset('assets/backend')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('')}}/css/style.css" rel="stylesheet" type="text/css" />
    @stack('css')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('backend/layouts/partials/header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        @include('backend/layouts/partials/sidebar')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <!-- content -->
            @yield('content')
            <!-- Footer Start -->
            @include('backend/layouts/partials/footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->


    <!-- Vendor js -->
    <script src="{{asset('assets/backend')}}/js/vendor.min.js"></script>

    <script src="{{asset('assets/backend')}}/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{asset('ui/backend')}}/libs/peity/jquery.peity.min.js"></script>

    <!-- Sparkline charts -->
    <script src="{{asset('assets/backend')}}/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    
    <!-- init js -->
    <script src="{{asset('assets/backend')}}/js/pages/dashboard-1.init.js"></script>
    <script src="{{asset('assets/backend')}}/fonts/js/all.min.js"></script>
    
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- App js -->
    <!-- third party js -->
    <script src="{{ asset('') }}assets/backend/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/buttons.flash.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/datatables/dataTables.select.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/backend/libs/pdfmake/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('') }}assets/backend/js/pages/datatables.init.js"></script>

    <script src="{{asset('assets/backend')}}/js/app.min.js"></script>
    
    <script src="{{ asset('') }}assets/backend/libs/select2/select2.min.js"></script> 
    @stack('js')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>


</body>

</html>
