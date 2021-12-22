@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')
   <!-- Site Overlay -->
   <div class="site-overlay"></div>
   <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" data-jarallax='{"speed": 0.2}'
    style='background-image: url("images/bg14.jpg")'>
    <div class="container">
        <div class="row">
            <div class=" col-md-8 ml-auto mr-auto">
                <h1 class='text-uppercase'>Tentang Kami</h1>

            </div>
        </div>
    </div>
</div><!--page title end-->

<div class="container pt90 pb60">
    <div class="row align-items-center">
        <div class="col-lg-4 mb20">
           <img src="{{asset('image/company')}}/{{$c_founder->image}}" 
          alt="" srcset="" width="300px;">
        </div>
        <div class="col-lg-6 mb20">
            {{-- <h2 class="mb40">
             
            </h2> --}}
            <div class="clearfix mb20">
                <div class="media mb30 wow fadeInUp" data-wow-delay=".150ms">
                    <div class="">
                        {!!$c_founder->content_name !!}
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row pb50 align-item-center">
        <div class="col-sm-12 mb40">
            <h2 class="text-center">{{$c_history->container_name}}</h2>
            {{-- <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat urna arcu, vel molestie nunc commodo non. Nullam vestibulum odio vitae fermentum rutrum.
            </p> --}}
            <p>
                {!!$c_history->content_name!!}
            </p>
    
        </div>
        {{-- <div class="col-sm-6 mb40">
            <div class="carousel-image owl-carousel owl-theme carousel-dark">
                <div class="item">
                    <img src={{ asset('vendors/images/contained1.jpg')}} alt="" class="img-fluid">
                </div>
                <div class="item">
                    <img src={{ asset('vendors/images/contained2.jpg')}} alt="" class="img-fluid">
                </div>                
            </div> <!-- /Carousel -->
        </div> --}}
    </div>
    {{-- <div class="row pb50">
        <div class="col-md-4 mb30">
            <h4 class="text-uppercase">
                Our Mission
            </h4>
            <p>
                Mauris lobortis nulla ut aliquet interdum. Donec commodo ac elit sed placerat. Mauris rhoncus est ac sodales gravida. In eros felis, elementum aliquam nisi vel, pellentesque faucibus nulla.
            </p>
        </div>
        <div class="col-md-4 mb30">
            <h4 class="text-uppercase">
                Our Vision
            </h4>
            <p>
                Mauris lobortis nulla ut aliquet interdum. Donec commodo ac elit sed placerat. Mauris rhoncus est ac sodales gravida. In eros felis, elementum aliquam nisi vel, pellentesque faucibus nulla.
            </p>
        </div>
        <div class="col-md-4 mb30">
            <h4 class="text-uppercase">
                Why choose us
            </h4>
            <p>
                Mauris lobortis nulla ut aliquet interdum. Donec commodo ac elit sed placerat. Mauris rhoncus est ac sodales gravida. In eros felis, elementum aliquam nisi vel, pellentesque faucibus nulla.
            </p>
        </div>
    </div> --}}
</div>
@endsection

@push('js')
    
@endpush