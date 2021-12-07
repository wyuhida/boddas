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
                                        <h5 class="mt-0 mb-1"><a href="{{route('blog_detail',$o_blog->id)}}">{{$o_blog->title}}</a></h5>
                                        {{$o_blog->created_at->diffForHumans()}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
              
                <!-- HERO -->
                <div class="col-md-9">
                    @forelse($show_news as $key => $s_news)
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
                            
                                <a href="{{route('blog_detail',$s_news->id)}}" class="btn btn-outline-secondary">Baca Selanjutnya</a>

                            @empty
                                <p class="text-center">
                                    <strong> Artikel tidak di temukan</strong>
                                </p>
                            </div>
                        
                        </article><!--article-->

                        

                    @endforelse
                    <nav aria-label="Page navigation example" class="mb70">
                        <ul class="pagination pagination justify-content-end">
                            {!! $show_news->render('customPagination') !!}
                        </ul>
                    </nav>

                    

                    
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush