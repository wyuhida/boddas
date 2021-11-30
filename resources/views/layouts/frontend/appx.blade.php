<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href={{ asset('assets/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{ asset('assets/font-awesome/css/font-awesome.css')}} rel="stylesheet">

    <link href={{ asset('assets/css/animate.css')}} rel="stylesheet">

    
    <link href="{{ asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href={{ asset('assets/css/style.css')}} rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
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
     <script src={{ asset('assets/js/jquery-3.1.1.min.js')}}></script>
     <script src={{ asset('assets/js/bootstrap.min.js')}}></script>
     <script src={{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}></script>
     <script src={{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}></script>

      <!-- Jasny -->
    <script src="{{ asset('assets/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>


  <script>
      Dropzone.options.dropzoneForm = {
          paramName: "file", // The name that will be used to transfer the file
          maxFilesize: 2, // MB
          dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
      };

      $(document).ready(function(){

          var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
              lineNumbers: true,
              matchBrackets: true
          });

          var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
              lineNumbers: true,
              matchBrackets: true
          });

          var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
              lineNumbers: true,
              matchBrackets: true
          });

     });
  </script>
 
     <!-- Flot -->
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.spline.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.resize.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.pie.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.symbol.js')}}></script>
     <script src={{ asset('assets/js/plugins/flot/jquery.flot.time.js')}}></script>
 
     <!-- Peity -->
     <script src={{ asset('assets/js/plugins/peity/jquery.peity.min.js')}}></script>
     <script src={{ asset('assets/js/demo/peity-demo.js')}}></script>
 
     <!-- Custom and plugin javascript -->
     <script src={{ asset('assets/js/inspinia.js')}}></script>
     <script src={{ asset('assets/js/plugins/pace/pace.min.js')}}></script>
 
     <!-- jQuery UI -->
     <script src={{ asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}></script>
 
     <!-- Jvectormap -->
     <script src={{ asset('assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}></script>
     <script src={{ asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}></script>
 
     <!-- EayPIE -->
     <script src={{ asset('assets/js/plugins/easypiechart/jquery.easypiechart.js')}}></script>
 
     <!-- Sparkline -->
     <script src={{ asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}></script>
 
     <!-- Sparkline demo data  -->
     <script src={{ asset('assets/js/demo/sparkline-demo.js')}}></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {!! Toastr::message() !!}

    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script>
    <!-- Custom and plugin javascript -->

     
     @stack('js')
</body>
</html>
