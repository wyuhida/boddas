@extends('layouts.frontend.app')
@push('css')
    
@endpush
@section('content')

@push('css')
    <style>
        h2 {
        width: 100%; 
        text-align: left; 
        border-bottom: 1px solid #000; 
        line-height: 0.1em;
        margin: 10px 0 20px; 
        } 

    h2 span { 
        background:#fff; 
        padding:0 10px; 
    }
    </style>
@endpush
@section('content')


<section class="bg-white dark:bg-gray-900 font-Inter">
    <div class="container py-8 mx-auto">
        <div class="lg:flex lg:-mx-2">
         

            <div class="mt-6 lg:mt-0 lg:px-2 lg:w-2/3">
               <div class="px-11 flex items-center">
                    <form class="w-full" action="{{ route('show_blog')}}" method="GET">
                        <div class="flex flex-col overflow-hidden border rounded-lg dark:border-gray-600 lg:flex-row">
                            <input class="px-6 w-full py-3 text-gray-700 placeholder-gray-500 
                                
                                bg-white outline-none dark:bg-gray-800 
                                dark:placeholder-gray-400 focus:placeholder-transparent 
                                dark:focus:placeholder-transparent"
                             type="text" name="search" value="{{ request()->query('search')}}" placeholder="Search" aria-label="">
                            
                            <button class="px-4 py-3 text-sm 
                            font-medium tracking-wider text-gray-100 
                            uppercase transition-colors duration-200 
                            transform bg-bg-tombol hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">search</button>
                        </div>
                    </form>
                </div>
                <!-- search -->
                
                <!-- blog -->
                <div class="px-11 flex gap-8 mt-2 w-full">
                
                    <div class=" flex flex-col w-full">
                        <div class="overflow-hidden rounded shadow dark:bg-gray-800">
                            <img class="object-cover w-full h-80" 
                            src="{{asset('image/artikel')}}/{{$detail_blog->thumbnail}}" alt="" srcset="">
                        </div>
                        <div class="py-5 text-left">
                            <h1 class="block mt-2 text-xl font-semibold mb-5
                                 text-gray-800 dark:text-white hover:text-gray-600">
                                 {{$detail_blog->title}}
                            </h1>
                             <p class="mt-5 py-5 text-sm text-gray-600 dark:text-gray-400 inline font-inter ">
                                {!! $detail_blog->body_news !!}
                             </p>
                             <p class="text-sm py-3 font-Inter text-gray-400">{{\Carbon\Carbon::parse($detail_blog->created_at)->translatedFormat('l, d F Y - h:i:s')}}</p>
                        </div>
                  
                    </div>
                  
               
                </div>
                <!-- blog -->
              
              
            </div>

            <!-- side -->
            <div class="space-y-3 lg:w-1/3 lg:px-2 lg:space-y-4 h-full bg-hero-color border">
                <div class="flex items-center overflow-hidden rounded py-5 justify-center border mx-5">
                    <img class="object-cover items-center w-full h-64 shadow-lg dark:bg-gray-800" 
                    src="{{asset('images/bodas-cover.jpg')}}" alt="" srcset="">
                </div>
                <p class="mx-5 text-left font-bold text-2xl">Boddas</p>
                <p class="mx-5 text-left font-Inter text-sm">Satu-satunya minuman serbuk collagen tanpa perasa dan pewarna pertama di Indonesia.fdsfds</p>
                
                <div class="flex flex-col mx-5 divide-x relative">
                    <h1 class="text-lg font-bold font-Inter  w-fit">Lainnya</h1>
                    <div class="border-b top-0 border-gray-300 w-full"></div>

                </div>
                
                @if($randomBlog != null)
                @foreach($randomBlog as $key => $o_blog)
                <div class="flex max-w-sm mx-auto overflow-hidden dark:bg-gray-800">
                    <div class="w-32 h-32 bg-cover" 
                        style="background-image: url('{{asset('image/artikel')}}/{{$o_blog->thumbnail}}')">
                    </div>

                    <div class="w-full md:px-2 h-40">
                        <h1 class="text-sm font-bold text-gray-800 dark:text-white">{{$o_blog->title}}</h1>

                        <p class="text-sm text-gray-600 dark:text-gray-400 inline">
                            {!! Str::limit($o_blog->body_news,'250','..') !!}
                        </p>
                        <a href=""><span class="text-bg-tombol text-sm font-bold inline">Baca Selengkapnya</span></a>
                    </div>
                </div>
                @endforeach
                @endif
                               
                
                <div class="flex flex-col mx-5 divide-x relative">
                    <h1 class="text-lg font-bold font-Inter  w-fit">Promo</h1>
                    <div class="border-b top-0 border-gray-300 w-full"></div>

                </div>
                

                <div class="rounded shadow  mx-5 dark:bg-gray-800 relative">
                    <img class="object-cover w-full h-48 bg-center brightness-50 mb-10" 
                    src="{{asset('images/bodas-cover.jpg')}}" alt="" srcset="">
                    
                    <div class="absolute  text-xl bottom-0 left-0 w-32 px-3 mb-3">
                        <h1 class="text-white font-bold font-Inter">Discount 30% for all item</h1>
                    </div>
                </div>
            </div>
            <!-- side-->

        </div>
    </div>
</section>
@endsection

@push('js')
    
@endpush
@endsection

@push('js')
    
@endpush