@extends('layouts.frontend.app')
@section('title','Produk')
    
@push('css')
    
@endpush

@section('content')
<?php
    use App\Http\Controllers\ShopController;
    if(ShopController::total_diskon() != null)
    {
        $tot =ShopController::total_diskon();
        $total=$tot['discount_percentage'];
    }else {
        $total = 0;
    }
?>

 <!-- Hero -->
    
 <section class="bg-hero-color dark:bg-gray-800 sm:w-full ">
    <div class="container sm:w-full lg:px-8 mx-auto flex flex-col md-col-1 lg-col-2">
        <div class="items-center lg:flex">
           
            <div class="mt-auto lg:mt-0 lg:w-1/2 mb-12">
              <div class="flex items-center justify-center">
                  <div class="flex flex-1 max-w-lg">
                      <img class="object-cover object-center
                      drop-shadow-lg
                      mt-6
                      h-1/4
                      w-full" 
                      src="{{asset('images/produk-section1.jpg')}}" alt="">
                  </div>
              </div>
          </div>

          <div class="lg:w-1/2 lg:px-12 mb-10">
            <h2 class="
         
                mt-5
                text-6xl 
                font-bold
                text-left
                font-Inter-600 
                
                ">
                Cantik dan Sehat dengan yang Halal
            </h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400 lg:max-w-md">
                Satu-satunya minuman serbuk collagen tanpa perasa dan pewarna pertama di Indonesia. 
                Bersertifikat BPOM (BPOM RI MD 867028042317) dan Bersertifikat HALAL dari MUI.
            </p>
        </div>

         
        </div>
       
    </div>
</section>

 <!-- End Hero -->

 <!--section 2 -->
 <section class="py-20 ">
    <!-- heading -->
    <div class="sm:3/4 mx-auto px-11">
        <h2 class="py-2 font-Inter text-sm text-left text-gray-500">Our Product</h2>
        <h1 class="text-3xl text-left text-gray-600 font-Inter">
            Most Popular Product
        </h1>
    </div>
    <!-- Product -->
    <div class="container 
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 gap-4 px-5 justify-center">
        @foreach($item->groupBy('id_item') as $items)
        {{-- @dd($items); --}}
        @foreach($items as $itm)
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
          
          <div class="items-center mx-auto mt-8 max-h-48 ">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm "
            src="{{asset('image/product')}}/{{$itm[0]->photo}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">{{$itm[0]->item_name}}</h2>

            @if(!empty(Auth::user()->id))
                @if(auth()->user()->id_role == 3)
             
                  <del class="text-sm">Rp {{ number_format($itm[0]->price)}}</del>
                  <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price-($total*$itm[0]->price))}}</h3>
                @else
                  <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price)}}</h3>
                @endif
              @else
                <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price)}}</h3>
              @endif
        
           

            <div class="py-4 mb-3">
                <a href="{{route('detail_shop',$itm[0]->id_item)}}" class="px-2 py-2 
                    rounded text-bg-tombol 
                    transition-colors 
                    duration-200 transform 
                     border border-bg-tombol
                    text-bg-tombol
                    ">
                    Discover Now
                </a>
            </div>
          </div>
         
        </div>
        @endforeach
        @endforeach

    </div>
    <!-- end product -->
</section>

<!-- end section 2 -->

<!-- Section 3 -->    
<section class="dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
    <div class="dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:rounded-lg">
       
        <div class="max-w-full px-6 py-12 lg:max-w-5xl lg:w-1/2 gap-3">
            <h3 class="text-bold py-2">Our Stars</h3>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl font-Inter">Collagen Goes On And Always On</h2>
            
            <div class="py-7 text-center inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">1,500</h6>
                <p class="text-sm tracking-wides px-2  text-gray-800 capitalize">
                  Sold Product
                </p>
            </div>
            <div class="py-7 text-center  inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">500</h6>
                <p class="text-sm tracking-widest px-2 text-gray-800 capitalize">
                    Positive Feedback
                </p>
            </div>

            <div class="py-7 text-center  inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">400</h6>
                <p class="text-sm tracking-widest px-2 text-gray-800 capitalize">
                    Official Store
                </p>
            </div>
           
            <div class="mt-8">
                <a href="#" class="px-3 py-3  text-white transition-colors duration-200 transform bg-bg-tombol">
                    Get Special Promo
                </a>
            </div>
        </div>
        <div class="rectangle-2 ">
            <div class="img-2">
                <img src="{{asset('images/produk-section3.png')}}" alt="" srcset="">
            </div>
       </div>
    </div>
</section>
<!-- Section 3 -->  

<!--Section 4 -->
<section class="py-20 ">
    <!-- heading -->
    <div class="sm:3/4 mx-auto px-11">
        <h2 class="py-2 font-Inter text-sm text-left text-gray-500">Our Product</h2>
        <h1 class="text-3xl text-left text-gray-600 font-Inter">
            New Comer Product
        </h1>
    </div>
      <!-- Product -->
     <!-- Product -->
      <div class="container 
          grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 gap-4 px-5 justify-center">
          @foreach($item->groupBy('id_item') as $items)
          {{-- @dd($items); --}}
          @foreach($items as $itm)
          <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
        
          <div class="items-center mx-auto mt-8 max-h-48 ">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm "
            src="{{asset('image/product')}}/{{$itm[0]->photo}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
              <svg class="w-5 inline fill-bookmark-yellow stroke-bookmark-yellow" 
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">{{$itm[0]->item_name}}</h2>

            @if(!empty(Auth::user()->id))
                @if(auth()->user()->id_role == 3)
              
                  <del class="text-sm">Rp {{ number_format($itm[0]->price)}}</del>
                  <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price-($total*$itm[0]->price))}}</h3>
                @else
                  <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price)}}</h3>
                @endif
              @else
                <h3 class="text-2xl text-bg-tombol">Rp {{number_format($itm[0]->price)}}</h3>
              @endif
        
            

            <div class="py-4 mb-3">
                <a href="{{route('detail_shop',$itm[0]->id_item)}}" class="px-2 py-2 
                    rounded text-bg-tombol 
                    transition-colors 
                    duration-200 transform 
                      border border-bg-tombol
                    text-bg-tombol
                    ">
                    Discover Now
                </a>
            </div>
          </div>
        
      </div>
     @endforeach
     @endforeach

    </div>
 <!-- end product -->
    <!-- end product -->
</section>

@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush