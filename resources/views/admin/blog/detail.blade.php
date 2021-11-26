@extends('layouts.backend.app')
@section('title','Tambah Blog')

@push('css')
        {{-- <link href={{ asset('assets/css/plugins/summernote/summernote.css')}} rel="stylesheet">
        <link href={{ asset('assets/css/plugins/summernote/summernote-bs3.css')}} rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="wrapper wrapper-content  animated fadeInRight article">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox">
                <div class="ibox-content">
                    {{-- <div class="pull-right">
                        <button class="btn btn-white btn-xs" type="button">Model</button>
                        <button class="btn btn-white btn-xs" type="button">Publishing</button>
                        <button class="btn btn-white btn-xs" type="button">Modern</button>
                    </div> --}}
                    <div class="text-center article-title">
                    <span class="text-muted"><i class="fa fa-clock-o"></i> {{$detail->created_at}}</span>
                        <h1>
                           {{$detail->title}}
                        </h1>
                    </div>
                    <p>
                        {{ 
                            strip_tags(htmlspecialchars_decode($detail->body_news))
                          }}
                    </p>
                    
                    <hr>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('js')
    
@endpush