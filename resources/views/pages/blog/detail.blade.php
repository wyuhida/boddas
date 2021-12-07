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
                                    alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><a href="{{route('blog_detail', $o_blog->id)}}">{{$o_blog->title}}</a></h5>
                                        {{$o_blog->created_at}}
                                    </div>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
              
                <!-- HERO -->
                <div class="col-md-9">
                 
                        <article class="article-post mb70">
                            <a class="post-thumb mb30" href="#">
                                <img src="{{asset('image/artikel')}}/{{$detail_blog->thumbnail}}" alt="{{$detail_blog->title}}" width="1140px;" height="500px;">
                                <div class="post-overlay">
                                    <span>{{$detail_blog->title}}</span>
                                </div>
                            </a><!--thumb-->
                            <div class="post-content">
                                <h2 class="post-title">{{$detail_blog->title}}</h2>
                                <ul class="post-meta list-inline">
                                    <li class="list-inline-item">
                                        <i class="fa fa-user-circle-o"></i> <a href="#">{{$detail_blog->role_name}}</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-calendar-o"></i> <a href="#">{{ $detail_blog->created_at}}</a>
                                    </li>
                                </ul>
                            <p>{!! $detail_blog->body_news !!}</p>
                            
                                
                            </div>
                        
                        </article><!--article-->

                        
                 
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush