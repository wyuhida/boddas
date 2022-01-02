<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      
                <!-- Plugins CSS -->
      
         <title>Home</title>    
         <!-- Plugins CSS -->
         <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
         <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
         <link rel="stylesheet" href="{{asset('css/app.css')}}" />

         <style>
             .btns{
                 max-width: 150px;
             }
             .rectangle {
             width: 541px;
             height: 608px;
             flex-grow: 0;
             margin: 0 29px 0 0;
             padding: 69px 0 34.8px;
             background-color: #fff7f4;
             }
             .img {
                 width: 471px;
                 height: 469.9px;
                 flex-grow: 0;
                 margin: 0 0 34.3px 70px;
                 box-shadow: 10px 10px 10px 0 rgba(0, 0, 0, 0.25);
             }
             .rectangle-2 {
                 width: 541px;
                 height: 608px;
                 flex-grow: 0;
                 margin: 0 0 0 1px;
                 padding: 103px 0 34.8px;
                 background-color: #fff7f4;
             }
                 .img2 {
                 width: 471px;
                 height: 471px;
                 flex-grow: 0;
                 margin: 68px 71px 69px 0;
                 box-shadow: 10px 10px 10px 0 rgba(0, 0, 0, 0.25);
             }
             .videos {
                 width: 292.5px;
                 height: 292.5px;
                 flex-grow: 0;
                 margin: 68px 0 0.5px;
                 background-color: rgba(0, 0, 0, 0.6);
             }
     
             .Vector {
                 width: 291px;
                 height: 291px;
                 flex-grow: 0;
                 padding: 36.3px 27.3px 33.8px 36.8px;
                 border: solid 1.5px #ff6875;
                 }
                 .titles {
       width: 227px;
       height: 39px;
       flex-grow: 0;
       margin: 0 0 64px;
       font-family: Inter;
       font-size: 32px;
       font-weight: 500;
       font-stretch: normal;
       font-style: normal;
       line-height: normal;
       letter-spacing: normal;
       text-align: left;
       color: #1d1d1f;
     }      
     .dropdown:hover .dropdown-menu {
        display: block;
        }
       
</style>
          <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
    @stack('css')

</head>
<body class="font-Roboto-600">
    {{-- <div id="preloader">
        <div id="preloader-inner"></div>
    </div><!--/preloader--> --}}
   



     <!--top bar-->
    {{-- @include('layouts.frontend.partials.topbar') --}}
    <!--/top bar-->

     <!--/nav bar-->
    @include('layouts.frontend.partials.navbar')
     
    @yield('content')
 

    @include('layouts.frontend.partials.footer')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> --}}

     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <link rel="stylesheet" type="text/css" 
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

     {!! Toastr::message() !!}

     <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>


    {{-- <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script> --}}

  
     
    @stack('js')
</body>
</html>
