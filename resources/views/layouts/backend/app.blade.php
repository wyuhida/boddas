<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Boddas') }}</title>

    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    
    {{-- <link href={{ asset('assets/css/plugins/sweetalert/sweetalert.css')}} rel="stylesheet"> --}}
         <!-- FooTable -->

    <link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

         
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    @stack('css')

</head>
<body>
    <div id="wrapper">
        @include('sweetalert::alert')
        @include('layouts.backend.partials.side-navigation')
       
       

        <div id="page-wrapper" class="gray-bg">
            @include('layouts.backend.partials.top-navigation')
          
            @yield('content')

            @include('layouts.backend.partials.footer')

        </div>
        

     
    </div>

   <!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

<!-- Flot -->
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>

<!-- Peity -->
<script src="{{ asset('assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{ asset('assets/js/demo/peity-demo.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('assets/js/inspinia.js')}}"></script>
<script src="{{ asset('assets/js/plugins/pace/pace.min.js')}}"></script>


<!-- GITTER -->
<script src="{{ asset('assets/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{ asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('assets/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{ asset('assets/js/plugins/chartJs/Chart.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>


<script>
    $(document).ready(function() {
        // setTimeout(function() {
        //     toastr.options = {
        //         closeButton: true,
        //         progressBar: true,
        //         showMethod: 'slideDown',
        //         timeOut: 4000
        //     };
        //     toastr.success('Hi, {{ Auth::user()->name }}', 'Welcome to Back Office Damping Indonesia');

        // }, 1300);


        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        
    });
</script>

<script>
    $(document).ready(function(){

        $('#loading-example-btn').click(function () {
            btn = $(this);
            simpleLoad(btn, true)

            // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

            simpleLoad(btn, false)
        });
    });

    function simpleLoad(btn, state) {
        if (state) {
            btn.children().addClass('fa-spin');
            btn.contents().last().replaceWith(" Loading");
        } else {
            setTimeout(function () {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Refresh");
            }, 2000);
        }
    }

    $( "#logout" ).on( "click", function() {
        Swal.fire({
            title: 'Apakah anda yakin ingin logout?',
            showDenyButton: true,
            // showCancelButton: true,
            confirmButtonText: 'Logout',
            denyButtonText: `Batalkan`,
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Logout Berhasil!', '', 'success')
                window.location = "{{route('logout')}}";
            } else if (result.isDenied) {
                Swal.fire('Dibatalkan', '', 'info')
            }
        })
    });
</script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
</script>



{!! Toastr::message() !!}
<script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
        $('.footable').footable();
    });

</script>
    


@stack('js')
</body>
</html>
