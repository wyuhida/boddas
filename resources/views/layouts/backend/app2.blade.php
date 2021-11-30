<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>    
        <!-- Bootstrap-->
        <link href={{asset('vendors/lib/bootstrap/dist/css/bootstrap.min.css')}} rel="stylesheet">
        <!--Common Plugins CSS -->
        <link href={{asset('vendors/css/plugins/plugins.css')}} rel="stylesheet">
        <!--fonts-->
        <link href={{asset('vendors/lib/line-icons/line-icons.css')}} rel="stylesheet">
        <link href={{asset('vendors/lib/font-awesome/css/fontawesome-all.min.css')}} rel="stylesheet">
        
        <link href={{asset('vendors/lib/data-tables/dataTables.bootstrap4.min.css')}} rel="stylesheet">
        <link href={{asset('vendors/lib/data-tables/responsive.bootstrap4.min.css')}} rel="stylesheet">

        <link href={{asset('vendors/css/style.css')}} rel="stylesheet">

        <style>
            .footer-custom{
                position: fixed;
                /* padding: 10px 10px 0px 10px; */
                bottom: 0;
                width: 100%;
            /* Height of the footer*/ 
            }
        </style>
        @stack('css')
    </head>
    <body class="">

        <div class="page-wrapper" id="page-wrapper">
            
            @include('layouts.backend.partials.side-navigation')

            <main class="content">
                <!-- FOR TOP NAVIGATION -->
                @include('layouts.backend.partials.top-navigation')
                <!-- END TOP NAVIGATION -->

               <!-- FOR CONTENT -->

                @yield('content')

                <!-- END FOR CONTENT -->

              
                
            </main><!-- page content end-->
        </div><!-- app's main wrapper end -->
        <!-- Common plugins -->
       
        <script type="text/javascript" src="{{asset('vendors/lib/peity/jquery.peity.min.js')}}"></script>
        <script type="text/javascript" src={{ asset('vendors/js/plugins/plugins.js')}}></script> 
        <script type="text/javascript" src={{ asset('vendors/js/appUi-custom.js')}}></script> 

          <!-- Required datatable js -->
          <script type="text/javascript" src={{ asset('vendors/lib/data-tables/jquery.dataTables.min.js')}}></script> 
          <script type="text/javascript" src={{ asset('vendors/lib/data-tables/dataTables.bootstrap4.min.js')}}></script> 
          <script type="text/javascript" src={{ asset('vendors/lib/data-tables/dataTables.responsive.min.js')}}></script> 
          <script type="text/javascript" src={{ asset('vendors/lib/data-tables/responsive.bootstrap4.min.js')}}></script> 
          <script src={{asset('vendors/js/plugins-custom/datatables-custom.js')}}></script>
        @stack('js')
    </body>
</html>
