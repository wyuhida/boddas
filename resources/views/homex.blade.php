@extends('layouts.frontend.app')
@section('title','Home')
@push('css')

@endpush

@section('content')
        <!-- Pushy Menu -->
    <aside class="pushy pushy-right">
        <div class="cart-content">
          <div class="clearfix">
            <a href="javascript:void(0)" class="pushy-link text-white-gray">
              Close
            </a>
          </div>
          <ul class="list-unstyled">
            <li class="clearfix">
              <a href="#" class="float-left">
                <img
                  src="{{asset('vendors/images/shop/p1.jpg')}}"
                  class="img-fluid"
                  alt=""
                  width="60"
                />
              </a>
              <div class="oHidden">
                <span class="close"><i class="ti-close"></i></span>
                <h4><a href="#">Men's Special Watch</a></h4>
                <p class="text-white-gray">
                  <strong>$299.00</strong>
                  x 1
                </p>
              </div>
            </li>
            <!--/cart item-->
            <li class="clearfix">
              <a href="#" class="float-left">
                <img
                  src={{ asset('vendors/images/shop/p2.jpg')}}
                  class="img-fluid"
                  alt=""
                  width="60"
                />
              </a>
              <div class="oHidden">
                <span class="close"><i class="ti-close"></i></span>
                <h4><a href="#">Men's tour beg</a></h4>
                <p class="text-white-gray">
                  <strong>$99.00</strong>
                  x 1
                </p>
              </div>
            </li>
            <!--/cart item-->
            <li class="clearfix">
              <a href="#" class="float-left">
                <img
                  src={{ asset('vendors/images/shop/p3.jpg')}}
                  class="img-fluid"
                  alt=""
                  width="60"
                />
              </a>
              <div class="oHidden">
                <span class="close"><i class="ti-close"></i></span>
                <h4><a href="#">Women's T-shirts</a></h4>
                <p class="text-white-gray">
                  <strong>$199.00</strong>
                  x 1
                </p>
              </div>
            </li>
            <!--/cart item-->
            <li class="clearfix">
              <div class="float-right">
                <a href="#" class="btn btn-primary">Checkout</a>
              </div>
              <h4 class="text-white">
                <small>Subtotal -</small>
                $49.99
              </h4>
            </li>
            <!--/cart item-->
          </ul>
        </div>
    </aside>
      <!-- Site Overlay -->
      <div class="site-overlay"></div>
        <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
            <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>	
                    <!-- SLIDE  -->
                    <li data-index="rs-3045" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendors/images/bg1.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption mainSlide-Subtitle   tp-resizeme" 
                             id="slide-1706-layer-1" 
                             data-x="['left','left','left','left']" data-hoffset="['30','15','15','15']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['-102','-102','-92','-68']" 
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-fontsize="['20','20','20','20']"
                             data-lineheight="['25','25','25','25']"
                             data-type="text" 
                             data-responsive_offset="on"
                             data-frames='[{"delay":800,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 7; white-space: nowrap;text-transform:left;">take your project to a new level </div>
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption mainSlide-Title-Centered   tp-resizeme" 
                             id="slide-1706-layer-2" 
                             data-x="['left','left','left','left']" data-hoffset="['30','15','15','15']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']" 
                             data-fontsize="['55','55','40','30']"
                             data-lineheight="['65','65','55','35']"
                             data-width="['800','700','621','420']"
                             data-height="none"
                             data-whitespace="normal"

                             data-type="text" 
                             data-responsive_offset="on" 
                             data-frames='[{"delay":1400,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 6; text-align:left; max-width:1170px; white-space: normal;">Booddas</div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption mainSlide-Button btn btn-lg btn-white-outline " 
                             id="slide-1706-layer-3" 
                             data-x="['left','left','left','left']" data-hoffset="['30','15','15','15']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['112','112','112','96']" 
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"

                             data-type="button" 
                             data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                             data-responsive_offset="on" 
                             data-responsive="off"
                             data-frames='[{"delay":2000,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['left','left','left','left']"
                             data-paddingtop="[12,12,12,12]"
                             data-paddingright="[35,35,35,35]"
                             data-paddingbottom="[12,12,12,12]"
                             data-paddingleft="[35,35,35,35]"

                             style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">READ MORE </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-3046" data-transition="parallaxtoleft" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendors/images/bg13.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption mainSlide-Title-Centered   tp-resizeme" 
                             id="slide-1706-layer-4" 
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']" 
                             data-fontsize="['55','55','40','30']"
                             data-lineheight="['65','65','50','35']"
                             data-width="['900','800','621','420']"
                             data-height="none"
                             data-whitespace="normal"

                             data-type="text" 
                             data-responsive_offset="on" 
                             data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 6; text-align:center; white-space: normal;">Build Using modern tools </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption mainSlide-caption   tp-resizeme" 
                             id="slide-1706-layer-5" 
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['80','80','80','50']" 
                             data-fontsize="['24','24','24','16']"
                             data-lineheight="['34','34','34','26']"
                             data-width="['800','700','621','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-type="text" 
                             data-responsive_offset="on" 
                             data-frames='[{"delay":1400,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 6; text-align:left; max-width:1170px; white-space: normal;">lorem ipsum sit dolor</div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-3047" data-transition="parallaxtoright" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-saveperformance="off"  data-title="HTML5 Video" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('vendors/images/video/Busy-People.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- BACKGROUND VIDEO LAYER -->
                        <div class="rs-background-video-layer" 
                             data-forcerewind="on" 
                             data-volume="mute" 
                             data-videowidth="100%" 
                             data-videoheight="100%" 
                             data-videomp4="images/video/Busy-People.mp4" 
                             data-videopreload="auto" 
                             data-videoloop="none" 
                             data-forceCover="1" 
                             data-aspectratio="16:9" 
                             data-autoplay="true" 
                             data-autoplayonlyfirsttime="false" 
                             data-nextslideatend="true" 
                             ></div>
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption mainSlide-Title-Centered   tp-resizeme" 
                             id="slide-1706-layer-8" 
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','1']" 
                             data-fontsize="['55','55','40','30']"
                             data-lineheight="['65','65','50','35']"
                             data-width="['900','800','621','420']"
                             data-height="none"
                             data-whitespace="normal"

                             data-type="text" 
                             data-responsive_offset="on" 
                             data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 6; text-align:center; white-space: normal;">Smooth parallax videos </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption mainSlide-caption   tp-resizeme" 
                             id="slide-1706-layer-9" 
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                             data-y="['middle','middle','middle','middle']" data-voffset="['80','80','80','50']" 
                             data-fontsize="['24','24','24','16']"
                             data-lineheight="['34','34','34','26']"
                             data-width="['800','700','621','420']"
                             data-height="none"
                             data-whitespace="normal"
                             data-type="text" 
                             data-responsive_offset="on" 
                             data-frames='[{"delay":1400,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[10,10,10,10]"
                             data-paddingleft="[0,0,0,0]"
                             style="z-index: 6; text-align:left; max-width:1170px; white-space: normal;">Create a smooth parallax video background with assan easily</div>
                    </li>
                </ul>
                <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>	</div>
        </div>
        <!-- END REVOLUTION SLIDER -->


        <div class="container pt90">

            <div class="row pb60">
                <div class="col-lg-4 mb30 wow zoomInUp" data-wow-delay="100ms" data-wow-duration=".4s">
                    <div class="icon-box icon-box-center">
                        <i class="icon-hover-1 bg-primary icon-mobile icon-hover-default"></i>
                        <h4>Fully Responsive</h4>
                        <p>
                            Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.
                        </p>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb30 wow zoomInDown" data-wow-delay="200ms" data-wow-duration=".6s">
                    <div class="icon-box icon-box-center">
                        <i class="icon-hover-1 bg-primary icon-profile-male icon-hover-default"></i>
                        <h4>Trusted Author</h4>
                        <p>
                            Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.
                        </p>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb30 wow zoomInRight" data-wow-delay="300ms" data-wow-duration=".8s">
                    <div class="icon-box icon-box-center">
                        <i class="icon-hover-1 bg-primary icon-refresh icon-hover-default"></i>
                        <h4>Reusable Elements</h4>
                        <p>
                            Molestiae, repudiandae, maxime, earum, sapiente assumenda non odit laborum qui vero vel quos sint excepturi in laudantium.
                        </p>
                    </div>
                </div><!--/col-->
            </div>

        </div><!--/intro-->

        <div class="pt90 pb50 container">
            <div class="title-heading1 mb40">
                <h3>core features of assan</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-linegraph fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">Reusable elements</h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-phone fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">Mobile friendly</h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-twitter fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">Bootstrap 4 </h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
            </div>
            <div class="row">
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-lightbulb fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">Modern Layouts</h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-edit fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">Well Coded</h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
                <div class="col-lg-4 mb40">
                    <div class="media icon-simple">
                        <div class="d-flex mr-3">
                            <i class="icon-gift fa-3x text-primary"></i>  
                        </div>
                        <div class="media-body">
                            <h4 class="mt-0 mb10">15+ Templates</h4>
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div><!--/col-->
            </div>
        </div><!--Features-->

        <div class="bg-parallax parallax-overlay" data-jarallax='{"speed": 0.2}' style='background-image: url("images/bg5.jpg")'>
            <div class="container pt90 pb60">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb30">
                        <h3 class="text-white mb30">Company Analysis</h3>
                        <p class="text-white-gray">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                    <div class="col-lg-3 mb30 text-center">
                        <input type="text" class="progress-circle" data-width="50%" data-thickness=".05" data-bgColor="transparent" value="85" data-skin="tron" data-fgColor="#fff" data-readOnly="true">
                        <h4 class="pt30 text-white">Creative Startup</h4>
                    </div>
                    <div class="col-lg-3 mb30 mb30 text-center">
                        <input type="text" class="progress-circle" data-width="50%" data-thickness=".05" data-bgColor="transparent" value="75" data-skin="tron" data-fgColor="#fff" data-readOnly="true">
                        <h4 class="pt30 text-white">One Click Solutions</h4>
                    </div>
                </div>
            </div>
        </div><!--/.Analysis-->

        <div class='bg-dark'>
            <div class="pt90 container">
          <div class="row align-items-center">
              <div class="col-lg-8 text-center col-lg-10 mr-auto ml-auto">
                  <h2 class='text-white'>Lets get started your project</h2>
                  <p>
                  <p class='lead text-white-gray'>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                  <a href="#" class="btn btn-lg btn-rounded btn-primary">Buy Now</a><br>
                  <img src="images/browser-set.png" alt="" class="img-fluid pt40">
              </div>
          </div>
      </div>
      </div>


      <div class="bg-primary pt90 pb90">
        <div class="container">
            <!-- Carousel -->
            <div class="carousel-testimonial owl-carousel owl-theme carousel-dark">

                <div class="item">
                    <div class=" testimonial testimonial-dark">
                        <div class="row align-items-center">
                            <div class="col-lg-3 ml-md-5">
                                <img src="{{asset('vendors/images/customer-1.jpg')}}" alt="" class="img-fluid circle">
                            </div>
                            <div class="col-lg-7">
                                <p class="lead">
                                    " This is a great theme! I love it and recommend it to anyone wanting to purchase it. "
                                </p>
                                <h5>John Doe - <span>Assan Customer</span></h5>
                            </div>
                        </div>
                    </div>
                </div><!--item-->
                <div class="item">
                    <div class=" testimonial testimonial-dark">
                        <div class="row align-items-center">
                            <div class="col-lg-3 ml-md-5">
                                <img src="{{asset('vendors/images/customer-2.jpg')}}" alt="" class="img-fluid circle">
                            </div>
                            <div class="col-lg-7">
                                <p class="lead">
                                    " Compared to others this was a very easy to use and adapt template. It didn't break as easy with minor changes. Thanks "
                                </p>
                                <h5>John Doe - <span>Assan Customer</span></h5>
                            </div>
                        </div>
                    </div>
                </div><!--item-->
                <div class="item">
                    <div class=" testimonial testimonial-dark">
                        <div class="row align-items-center">
                            <div class="col-lg-3 ml-md-5">
                                <img src="{{asset('vendors/images/customer-3.jpg')}}" alt="" class="img-fluid circle">
                            </div>
                            <div class="col-lg-7">
                                <p class="lead">
                                    " Hello,
                                    your theme gets better and better on every version. Gratulation to this wonderful theme and please keep on working this way (good once)!! "
                                </p>
                                <h5>John Doe - <span>Assan Customer</span></h5>
                            </div>
                        </div>
                    </div>
                </div><!--item-->
            </div> <!-- /Carousel -->
        </div>
    </div><!--/.testimonials--> 

    <div class="bg-white">
        <div class="container pt50 pb30">
            <!-- Carousel -->
            <div class="carousel-client owl-carousel owl-theme">
                <div class="item text-center">

                    <img src="{{asset('vendors/images/cl-1.png')}}" alt="" class="img-fluid">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-2.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-3.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-4.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-5.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-1.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-2.png')}} alt="">
                </div>
                <div class="item text-center">

                    <img src={{ asset('vendors/images/cl-3.png')}} alt="">
                </div>
            </div> <!-- /Carousel -->
        </div><!--/.clients-->
    </div>
@endsection

@push('js')
    
@endpush

