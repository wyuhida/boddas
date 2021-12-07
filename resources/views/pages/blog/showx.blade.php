@extends('layouts.frontend.app')
@push('css')
    
@endpush
@section('content')
    <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" data-jarallax='{"speed": 0.2}' style='background-image: url("images/bg14.jpg")'>
        <div class="container">
            <div class="row">
                <div class=" col-md-8 ml-auto mr-auto">
                    <h1 class='text-uppercase'>Blog</h1>

                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30">
        <div class="row">
            <div class="col-md-3 mb40">
                    <div class="mb40">
                        <form action="{{ route('show_blog')}}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" 
                                placeholder="Cari Nama Aartikel" 
                                name="search" value="{{ request()->query('search')}}"
                                aria-describedby="basic-addon2">
                                <button class="input-group-addon" id="basic-addon2"><i class="ti-search"></i></button>
                            </div>
                        </form>
                    </div><!--/col-->
                
                    <div>
                        <h4 class="sidebar-title">Artikel</h4> 
                        <ul class="list-unstyled">
                            @foreach($randomBlog as $key => $o_blog)
                                <li class="media">
                                    <img class="d-flex mr-3 img-fluid" 
                                    width="64"
                                    style="height: 60px; margin-bottom: 10px;"
                                    src="{{asset('image/artikel')}}/{{$o_blog->thumbnail}}" 
                                    alt="{{$o_blog->title}}">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><a href="#">{{$o_blog->title}}</a></h5>
                                        {{$o_blog->created_at->diffForHumans()}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
              
                <!-- HERO -->
                <div class="col-md-9">
                    @foreach($show_news as $key => $s_news)
                        <article class="article-post mb70">
                            <a class="post-thumb mb30" href="#">
                                <img src="{{asset('image/artikel')}}/{{$s_news->thumbnail}}" alt="{{$s_news->title}}" width="1140px;" height="500px;">
                                <div class="post-overlay">
                                    <span>{{$s_news->title}}</span>
                                </div>
                            </a><!--thumb-->
                            <div class="post-content">
                                <a href="#"><h2 class="post-title">{{$s_news->title}}</h2></a>
                                <ul class="post-meta list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-user-circle-o"></i> <a href="#">{{$s_news->role_name}}</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-calendar-o"></i> <a href="#">{{$s_news->created_at->diffForHumans()}}</a>
                                    </li>
                                </ul>
                            <p> {!! Str::limit($s_news->body_news,'500','..') !!}</p>
                            
                                <a href="#" class="btn btn-outline-secondary">Baca Selanjutnya</a>
                            </div>
                        
                        </article><!--article-->

                        

                    @endforeach
                    <nav aria-label="Page navigation example" class="mb70">
                        <ul class="pagination pagination justify-content-end">
                            {{-- <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                            {!! $show_news->render('customPagination') !!}
                        </ul>
                    </nav>

                    {{-- <article class="article-post mb70">
                        <blockquote class="quote">
                            <p class="mb0 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, maiores esse temporibus accusantium quas soluta quis sed rerum. Sapiente, culpa fugit sit est laboriosam odit.</p>
                            <footer>John Doe, Google Inc.</footer>
                        </blockquote>
                        <div class="post-content">
                            
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-circle-o"></i> <a href="#">John Doe</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar-o"></i> <a href="#">29 June 2017</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-tags"></i> <a href="#">Bootstrap4</a>
                                </li>
                            </ul>
                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus .</p>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                        <a href="#" class="btn btn-outline-secondary">Read More</a>
                        </div>
                    </article> --}}
                    <!--article-->

                    {{-- <article class="article-post mb70">

                        <div class="embed-responsive embed-responsive-21by9 mb20">
                            <iframe src="https://www.youtube.com/embed/htPYk6QxacQ?ecver=2" style="position:absolute;width:100%;height:100%;left:0" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="post-content">
                            <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet</h2></a>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-circle-o"></i> <a href="#">John Doe</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar-o"></i> <a href="#">29 June 2017</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-tags"></i> <a href="#">Bootstrap4</a>
                                </li>
                            </ul>
                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus .</p>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                        <a href="#" class="btn btn-outline-secondary">Read More</a>
                        </div>

                    </article> --}}
                    <!--article-->

                    {{-- <article class="article-post mb70">
                        <!-- Carousel -->
                        <div class="carousel-image owl-carousel owl-theme mb40">
                            <div class="item">
                                <img src={{ asset('vendors/images/entry2.jpg')}} alt="" class="img-fluid">
                            </div>
                            <div class="item">
                                <img src={{ asset('vendors/images/entry3.jpg')}} alt="" class="img-fluid">
                            </div>                
                        </div> <!-- /Carousel -->

                        <div class="post-content">
                            <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet</h2></a>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-user-circle-o"></i> <a href="#">John Doe</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar-o"></i> <a href="#">29 June 2017</a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-tags"></i> <a href="#">Bootstrap4</a>
                                </li>
                            </ul>
                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus .</p>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                        <a href="#" class="btn btn-outline-secondary">Read More</a>
                        </div>

                    </article> --}}
                    <!--article-->

                    
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush