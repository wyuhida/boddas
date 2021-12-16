
 <footer class="footer footer-standard pt50 pb20">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb40">
                <h3>About Us</h3>
                <p>
                    In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.
                </p>
                <a href="#" class="btn btn-white-outline btn-sm">Learn More</a>
            </div>

            <div class="col-lg-3 col-md-6 mb40">
                <h3>Alamat</h3>
                <ul class="list-unstyled contact-list-item">
                    <li>
                        <i class="ti-home"></i>
                        {{$fk->address_name}}
                    </li>
                    <li>
                        <i class="ti-email"></i>
                        {{$fk->email}}
                    </li>
                    <li>
                        <i class="ti-mobile"></i>
                       {{$fk->num_phone}}
                    </li>
                </ul>
            </div>

            {{-- <div class="col-lg-2 col-md-6 mb40">
                <h3>Quick links</h3>
                <ul class="list-unstyled ">
                    <li>
                        <a href="#" class="social-icon si-dark si-colored-facebook si-gray-round">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                           
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-icon si-dark si-colored-facebook si-gray-round">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                           
                        </a>
                    </li>



                    {{-- <li>
                        <a href="#">
                            FAQS
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Term & conditions
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Privacy & policy
                        </a>
                    </li> 
                </ul>
            </div>--}}
            {{-- <div class="col-lg-3 col-md-6 mb40">
                <h3>Latest News</h3>
                <ul class="list-unstyled latest-news">
                    <li class="media">
                        <a href="#"> <img class="d-flex mr-3 img-fluid" width="64" src="images/img1.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Beautiful Sofa lamp at low price</a></h5>
                            April 05, 2017
                        </div>
                    </li>
                    <li class="media my-3">
                        <a href="#"> <img class="d-flex mr-3 img-fluid" width="64" src="images/img2.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5>
                            Jan 05, 2017
                        </div>
                    </li>
                    <li class="media">
                        <a href="#"> <img class="d-flex mr-3 img-fluid" width="64" src="images/img5.jpg" alt="Generic placeholder image"></a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">New awesome features of bootstrap 4</a></h5>
                            March 15, 2017
                        </div>
                    </li>
                </ul>
            </div> --}}
            <div class="col-lg-3 col-md-6 mb40">
                <h3>Headquarters</h3>
                <img src="images/map-img.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</footer><!--/footer-->

<div class="footer-bottomAlt" style="width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="clearfix">
                    <a href="{{$fk->facebook}}" class="social-icon-sm si-dark si-facebook si-dark-round">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="{{$fk->instagram}}" class="social-icon-sm si-dark si-twitter si-dark-round">
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="{{$fk->youtube}}" class="social-icon-sm si-dark si-g-plus si-dark-round">
                        <i class="fa fa-youtube"></i>
                        <i class="fa fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <span>&copy; Copyright 2017. All Right Reserved</span>
            </div>
        </div>
    </div>
</div><!--/footer bottom-->
<!--back to top-->