<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link href="{{ asset('superAdmin/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('superAdmin/dist/css/style.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    @yield('page_css')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('Admin.Layouts.header')
        @include('Admin.Layouts.sidebar')

        <div class="page-wrapper">
            @yield('content')

            @include('Admin.Layouts.footer')

        </div>

    </div>



    <script src="{{ asset('superAdmin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('superAdmin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('superAdmin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('superAdmin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('superAdmin/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- Charts js Files -->
    <script src="{{ asset('superAdmin/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('superAdmin/dist/js/pages/chart/chart-page-init.js') }}"></script>
    <script>
        const csrfToken = "{{ csrf_token() }}";

        $(document).ready(function() {

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            @foreach (['error', 'warning', 'success', 'info'] as $msg)
                @if (Session::has($msg))
                    var type = '{{ $msg }}';
                    var msg = '{{ Session::get($msg) }}';
                    switch (type) {
                        case 'success':
                            toastr.success(msg);
                            break;

                        case 'error':
                            toastr.error(msg);
                            break;

                        case 'warning':
                            toastr.warning(msg);
                            break;

                        case 'info':
                            toastr.info(msg);
                            break;
                    }
                @endif
            @endforeach
        });
    </script>
    @yield('script')
</body>

</html>
