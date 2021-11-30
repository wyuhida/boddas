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
      
      <div
        class="bg-parallax fullscreen mb70"
        data-jarallax='{"speed": 0.2}'
        style="background-image: url({{asset('vendors/images/cl-1.png')}});">
        <div class="d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-md-10 ml-auto mr-auto text-center">
                <div class="hero-text-style1">
                  <div class="h1 text-uppercase mb20">
                    Boddas Ecommerce
                  </div>
                  <!--/.tlt-->
                  <p class="lead">
                    A fresh and modern with bunch of features
                  </p>
                  <a href="#more" data-scroll class="btn btn-rounded btn-primary">
                    Learn More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       <!--hero-->
    <div class="container mb70">
        <div class="row">
          <div class="col">
            <h2 class="mb30">
              <strong>Light top bar</strong>
              Header Option
            </h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
              vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
              adipiscing sit amet. In eu justo a felis faucibus ornare vel id
              metus. Vestibulum ante ipsum primis in faucibus orci luctus et
              ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget
              metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque
              sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
              ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.
            </p>
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
              vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
              adipiscing sit amet. In eu justo a felis faucibus ornare vel id
              metus. Vestibulum ante ipsum primis in faucibus orci luctus et
              ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget
              metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque
              sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
              ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb10">
            <img src="images/bg1.jpg" alt="" class="img-fluid" />
          </div>
          <div class="col-md-8">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
            pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
            vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
            adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
            posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
            viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est
            varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat
            sapien, nec scelerisque ligula mollis lobortis.
          </div>
        </div>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
          pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
          vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
          adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus.
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
          cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra
          leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius
          diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien,
          nec scelerisque ligula mollis lobortis.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
          pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
          vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
          adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus.
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
          cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra
          leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius
          diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien,
          nec scelerisque ligula mollis lobortis.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
          pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
          vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
          adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus.
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
          cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra
          leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius
          diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien,
          nec scelerisque ligula mollis lobortis.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
          pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc
          vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh
          adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus.
          Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
          cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra
          leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius
          diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien,
          nec scelerisque ligula mollis lobortis.
        </p>
    </div>
    
    <div class="bg-parallax parallax-overlay" data-jarallax='{"speed": 0.2}' style='background-image: url("images/bg6.jpg")'>
        <div class="container pt60 pb60">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-white" style="text-align: center">
                        Boddas helps to improve your Shopp online
                    </h3>
                </div>
               
            </div>
        </div>
    </div><!--cta-->

    <div class="pt90 pb50 container">
        <div class="title-heading1 mb40">
            <h3>core features of boddas ecommerce</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 mb40">
                <div class="media icon-simple">
                    <div class="d-flex mr-3">
                        <i class="icon-linegraph fa-3x text-primary"></i>  
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb10">Fast Responses</h4>
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
                        <h4 class="mt-0 mb10">Free Shipping </h4>
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
                        <h4 class="mt-0 mb10">Well Discount</h4>
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
                        <h4 class="mt-0 mb10">100000+ Product</h4>
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
                    <h4 class="pt30 text-white">Quality Product</h4>
                </div>
                <div class="col-lg-3 mb30 mb30 text-center">
                    <input type="text" class="progress-circle" data-width="50%" data-thickness=".05" data-bgColor="transparent" value="75" data-skin="tron" data-fgColor="#fff" data-readOnly="true">
                    <h4 class="pt30 text-white">One Click Solutions</h4>
                </div>
            </div>
        </div>
    </div>
        <!--/.Analysis-->
        {{-- <div class="container pt90 pb60">
            <div class="row align-items-center">
                <div class="col-lg-5 mb30">
                    <div class="progress-label clearfix">
                        <span class="progress-title">
                            Jquery
                        </span>
                        <span class="progress-value float-right">
                            25%
                        </span>
                    </div><!--label-->
                    <div class="progress progress-default">

                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress-label clearfix">
                        <span class="progress-title">
                            photoshop
                        </span>
                        <span class="progress-value float-right">
                            50%
                        </span>
                    </div><!--label-->
                    <div class="progress progress-default">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress-label clearfix">
                        <span class="progress-title">
                            HTML5
                        </span>
                        <span class="progress-value float-right">
                            75%
                        </span>
                    </div><!--label-->
                    <div class="progress progress-default">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress-label clearfix">
                        <span class="progress-title">
                            CSS3
                        </span>
                        <span class="progress-value float-right">
                            85%
                        </span>
                    </div><!--label-->
                    <div class="progress progress-default">
                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-lg-6 ml-auto mb30">
                    <h3 class="mb20">Strategy Planning</h3>
                    <p>
                        Our clients range from FTSE 300 companies, to large charitable organisations and some small local businesses who are striving to expand. Most of our clients use our Data Analysis service to inform their strategic decision making and their targets for the immediate, mid-term and long-term future. The data sources that we use for this type of analysis include customer enquiry data, sales figures, costs, market data and customer feedback. Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want.
                    </p>
                    <a href="#" class="btn btn-lg btn-outline-primary"> Learn more</a>
                </div>
            </div>
        </div> --}}
        <!--/.Strategy Planning-->

        {{-- <div class='bg-dark'>
              <div class="pt90 container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-center col-lg-10 mr-auto ml-auto">
                        <h2 class='text-white'>Lets get started your project</h2>
                        <p>
                        <p class='lead text-white-gray'>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="#" class="btn btn-lg btn-rounded btn-primary">Buy Now</a><br>
                        <img src="{{asset("vendors/images/browser-set.png")}}" alt="" class="img-fluid pt40">
                    </div>
                </div>
            </div>
        </div> --}}

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
                                        " This is a great platform! I love it and recommend it to anyone wanting to purchase it. "
                                    </p>
                                    <h5>John Doe - <span>Seller</span></h5>
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
                                        " Shopping this was a very easy to use and adapt. It didn't break as easy with minor changes. Thanks "
                                    </p>
                                    <h5>John Doe - <span>Afiliate</span></h5>
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
                                        Gratulation to this wonderful product and please keep on working this way (good once)!! "
                                    </p>
                                    <h5>John Doe - <span>Customer</span></h5>
                                </div>
                            </div>
                        </div>
                    </div><!--item-->
                </div> <!-- /Carousel -->
            </div>
        </div><!--/.testimonials--> 


        <div class=" pt90 pb60">
            <div class="container">
                <div class="title-heading1 mb40">
                    <h3>Latest News</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb30 wow fadeInUp" data-wow-delay=".2s">
                        <div class="entry-card">
                            <a href="#" class="entry-thumb">
                                <img src={{ asset('vendors/images/entry1.jpg')}} alt="" class="img-fluid">
                                <span class="thumb-hover ti-back-right"></span>
                            </a><!--/entry thumb-->
                            <div class="entry-content">
                                <div class="entry-meta mb5">
                                    <span>
                                        May 15th 2017 
                                    </span>
                                </div>
                                <h4 class="entry-title text-capitalize">
                                    <a href="#">
                                        Manage grid items with bootstrap4 flex box sit amet
                                    </a>
                                </h4>
                                <p>
                                    Our clients range from FTSE 300 to large charitable  and some small local businesses who are striving to expand.
                                </p>
                                <div class="text-right">
                                    <a href="#" class="btn-link btn">Read More</a>
                                </div>
                            </div><!--/entry content-->
                        </div>
                    </div><!--/.col-->
                    <div class="col-lg-4 mb30 wow fadeInUp" data-wow-delay=".3s">
                        <div class="entry-card">
                            <a href="#" class="entry-thumb">
                                <img src={{ asset('vendors/images/entry2.jpg')}} alt="" class="img-fluid">
                                <span class="thumb-hover ti-back-right"></span>
                            </a><!--/entry thumb-->
                            <div class="entry-content">
                                <div class="entry-meta mb5">
                                    <span>
                                        May 15th 2017 
                                    </span>
                                </div>
                                <h4 class="entry-title text-capitalize">
                                    <a href="#">
                                        Manage grid items with bootstrap4 flex box sit amet
                                    </a>
                                </h4>
                                <p>
                                    Our clients range from FTSE 300  to large charitable  and some small local businesses who are striving to expand.
                                </p>
                                <div class="text-right">
                                    <a href="#" class="btn-link btn">Read More</a>
                                </div>
                            </div><!--/entry content-->
                        </div>
                    </div><!--/.col-->

                    <div class="col-lg-4 mb30 wow fadeInUp" data-wow-delay=".4s">
                        <div class="entry-card">
                            <a href="#" class="entry-thumb">
                                <img src={{ asset('vendors/images/entry3.jpg')}} alt="" class="img-fluid">
                                <span class="thumb-hover ti-back-right"></span>
                            </a><!--/entry thumb-->
                            <div class="entry-content">
                                <div class="entry-meta mb5">
                                    <span>
                                        May 15th 2017 
                                    </span>
                                </div>
                                <h4 class="entry-title text-capitalize">
                                    <a href="#">
                                        Manage grid items with bootstrap4 flex box sit amet
                                    </a>
                                </h4>
                                <p>
                                    Our clients range from FTSE 300  to large charitable  and some small local businesses who are striving to expand.
                                </p>
                                <div class="text-right">
                                    <a href="#" class="btn-link btn">Read More</a>
                                </div>
                            </div><!--/entry content-->
                        </div>
                    </div><!--/.col-->
                </div>
            </div>
        </div><!--news-->

        <div class="bg-faded pt90 pb90">
            <div class="container">
                <div class="title-heading1 mb50">
                    <h3>Subscribe to our newsletter</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6 mr-auto ml-auto">
                        <form id="widget-subscribe-form" action="index.html" role="form" method="post" class="mb0">
                            <div class="input-group input-group-lg">

                                <input type="email" name="widget-subscribe-form-email" class="form-control required" placeholder="Enter your Email">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Subscribe</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white">
            <div class="container pt50 pb30">
                <!-- Carousel -->
                <div class="carousel-client owl-carousel owl-theme">
                    <div class="item text-center">

                        <img src={{ asset('vendors/images/cl-1.png')}} alt="" class="img-fluid">
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

