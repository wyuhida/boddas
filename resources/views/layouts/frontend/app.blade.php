<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      
                <!-- Plugins CSS -->
      
         <title>Home</title>    
         <!-- Plugins CSS -->
         <link href={{ asset('vendors/css/plugins/plugins.css')}} rel="stylesheet">
         <!-- REVOLUTION STYLE SHEETS -->
         <link rel="stylesheet" type="text/css" href={{ asset('vendors/revolution/css/settings.css')}}>
         <!-- REVOLUTION LAYERS STYLES -->
         <link rel="stylesheet" type="text/css" href={{ asset('vendors/revolution/css/layers.css')}}>
         <!-- REVOLUTION NAVIGATION STYLES -->
         <link rel="stylesheet" type="text/css" href={{ asset('vendors/revolution/css/navigation.css')}}>
         <!-- load css for cubeportfolio -->
         <link rel="stylesheet" type="text/css" href={{ asset('vendors/cubeportfolio/css/cubeportfolio.min.css')}}>
         <link rel='stylesheet' href={{asset('vendors/revolution/revolution-addons/particles/css/revolution.addon.particles.css?ver=1.0.3')}} type='text/css'>
     
         <link href={{ asset('vendors/css/style.css')}} rel="stylesheet">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   
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
<body class="bg-gray">
    <div id="preloader">
        <div id="preloader-inner"></div>
    </div><!--/preloader-->

     <!--top bar-->
    {{-- @include('layouts.frontend.partials.topbar') --}}
    <!--/top bar-->

     <!--/nav bar-->
    @include('layouts.frontend.partials.navbar')
     <!--/nav bar-->
     <!-- Site Overlay -->
     <div class="site-overlay"></div>

    @yield('content')
    

    @include('layouts.frontend.partials.footer')


        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script type="text/javascript" src={{ asset('vendors/js/plugins/plugins.js')}}></script> 
        <script type="text/javascript" src={{ asset('vendors/js/assan.custom.js')}}></script> 
        <!-- load cubeportfolio -->
        <script type="text/javascript" src={{ asset('vendors/cubeportfolio/js/jquery.cubeportfolio.min.js')}}></script>
        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src={{ asset('vendors/revolution/js/jquery.themepunch.tools.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/jquery.themepunch.revolution.min.js')}}></script>
        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}></script>
        <script type="text/javascript" src={{ asset('vendors/revolution/js/extensions/revolution.extension.video.min.js')}}></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
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
     <script>
        /**Hero  script**/
        var tpj = jQuery;

        var revapi1078;
        tpj(document).ready(function () {
            if (tpj("#rev_slider_1078_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1078_1");
            } else {
                revapi1078 = tpj("#rev_slider_1078_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 8000,
                    navigation: {
                        arrows: {
                            enable: true,
                            style: 'uranus',
                            tmp: '',
                            rtl: false,
                            hide_onleave: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_over: 9999,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            left: {
                                container: 'slider',
                                h_align: 'left',
                                v_align: 'center',
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                container: 'slider',
                                h_align: 'right',
                                v_align: 'center',
                                h_offset: 0,
                                v_offset: 0
                            }
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1140, 992, 700, 465],
                    gridheight: [600, 600, 500, 480],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55]
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false
                    }
                });
            }
        });	/*ready*/
        //cube portfolio init
        (function ($, window, document, undefined) {
            'use strict';

            // init cubeportfolio
            $('#js-grid-mosaic-flat').cubeportfolio({
                filters: '#js-filters-mosaic-flat',
                layoutMode: 'mosaic',
                sortToPreventGaps: true,
                mediaQueries: [{
                        width: 1500,
                        cols: 6
                    }, {
                        width: 1100,
                        cols: 4
                    }, {
                        width: 800,
                        cols: 3
                    }, {
                        width: 480,
                        cols: 2,
                        options: {
                            caption: '',
                            gapHorizontal: 15,
                            gapVertical: 15
                        }
                    }],
                defaultFilter: '*',
                animationType: 'fadeOutTop',
                gapHorizontal: 0,
                gapVertical: 0,
                gridAdjustment: 'responsive',
                caption: 'fadeIn',
                displayType: 'fadeIn',
                displayTypeSpeed: 100,
                // lightbox
                lightboxDelegate: '.cbp-lightbox',
                lightboxGallery: true,
                lightboxTitleSrc: 'data-title',
                lightboxCounter: '<div class="cbp-popup-lightbox-counter"></div>',
                plugins: {
                    loadMore: {
                        selector: '#js-loadMore-mosaic-flat',
                        action: 'click',
                        loadItems: 3
                    }
                }
            });
        })(jQuery, window, document);
    </script> 
     
    @stack('js')
</body>
</html>
