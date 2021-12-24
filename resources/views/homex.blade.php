@extends('layouts.frontend.app')
@section('title','Home')
@push('css')

@endpush

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

@section('content')
   <!-- Hero -->
   <section class="bg-hero-color dark:bg-hero-color">
    <div class="container w-full flex md:px-8 mx-auto flex flex-col md-col-1 lg-col-2">
        <div class="items-center lg:flex">
            <div class="lg:w-1/2 px-2">
                <h2 class="
                    text-6xl 
                    mt-20
                    font-bold
                    text-left
                    font-Inter-600 
                    ">
                    We're Serious For Food
                </h2>
                <p class="mt-4 text-gray-500 dark:text-gray-400 lg:max-w-md">
                    We strive to provide a space where guests can connect with themselves and explore their full potential, offering a safe place.
                </p>
            </div>

            <div class="mt-8 lg:mt-0 lg:w-1/2 px-12">
              <div class="flex items-center justify-center lg:justify-end">
                  <div class="max-w-lg ">
                      <img class="object-cover object-center
                      -mb-48 mt-5
                      shadow-2xl
                     " src="{{asset('images/bodas-cover.jpg')}}" alt="">
                  </div>
              </div>
          </div>
         
        </div>
        
        <div class="px-11 mb-5 w-fit">
            <button type="button" 
                class="text-white bg-bg-tombol 
                     hover:bg-bookmark-foot1 
                     focus:ring-4 
                     focus:ring-bookmark-foot
                     font-medium 
                     text-sm px-3 py-3 
                     text-center 
                     inline-flex 
                     items-center 
                     dark:bg-bookmark-foot1 dark:hover:bg-bookmark-foot dark:focus:ring-bookmark-foot1">
                Choose plan
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
</section>

 <!-- End Hero -->



<section class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 sm:mx-auto">
      {{-- <h2 class="font-sans text-3xl font-bold leading-tight tracking-tight text-gray-900 sm:text-4xl sm:text-center">
        The quick, brown fox jumps over and over
        <span class="inline-block text-deep-purple-accent-400">a lazy dog</span>
      </h2> --}}
    </div>
    <hr class="m-9 border border-gray-200">
    <div class="grid gap-2 ml-11 row-gap-8 lg:grid-cols-4 bottom-0">
      <div class="flex">
        <div class="mr-4">
          <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
           <img
            class="w-px-70 h-px-70"
            src="{{asset('images/icon1.png')}}" alt="" srcset="">
          </div>
        </div>
        <div>
          <h6 class="mb-2 font-semibold leading-5">Bebas Ongkir</h6>
          <p class="text-sm text-gray-900">
            Dengan Min Pembelian 2 Pack
          </p>
        </div>
      </div>
      <div class="flex">
        <div class="mr-4">
          <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
            <img src="{{asset('images/icon2.png')}}" alt="" srcset="">
          </div>
        </div>
        <div>
          <h6 class="mb-2 font-semibold leading-5">Quick Payment</h6>
          <p class="text-sm text-gray-900">
            100% Pembayaran Aman
          </p>
        </div>
      </div>
      <div class="flex">
        <div class="mr-4">
          <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
            <img src="{{asset('images/icon3.png')}}" alt="" srcset="">
          </div>
        </div>
        <div>
          <h6 class="mb-2 font-semibold leading-5">Promo Spesial</h6>
          <p class="text-sm text-gray-900">
            Dapatkan Promo Spesial
          </p>
        </div>
      </div>

      <div class="flex">
        <div class="mr-4">
          <div class="flex items-center justify-center w-10 h-10 mb-3 rounded-full bg-indigo-50">
            <img src="{{asset('images/icon4.png')}}" alt="" srcset="">
          </div>
        </div>
        <div>
          <h6 class="mb-2 font-semibold leading-5">24/7 Support</h6>
          <p class="text-sm text-gray-900">
            Ready support
          </p>
        </div>
      </div>
    </div>
    <hr class="m-9 border border-gray-200">
</section>

 <!--section 2 -->

 <section class="dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center">
    <div class="dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:rounded-lg">
       <div class="rectangle">
            <div class="img">
                <img src="{{asset('images/produk-section1.jpg')}}" alt="" srcset="">
            </div>
       </div>

        <div class="max-w-full px-6 py-12 lg:max-w-5xl lg:w-1/2">
            <h3 class="text-bold py-2">Our Benefit</h3>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">The More Healthy Food The  <span class="text-blue-600 dark:text-blue-400">Better</span></h2>
            <p class="py-1">
                <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" />
                </svg>
                Tanpa Perasa Buatan dan Pewarna
            </p>
            <p class="py-1">
                <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" />
                </svg>
                Terdaftar BPOM
            </p>
            <p class="py-1">
                <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" />
                </svg>
                Bersertifikasi Halal MUI
            </p>

            <p class="py-1">
                <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" />
                </svg>
                Mengandung Astaxanthin, Glutathione, Hyaluronic Acid, dan 
                Kolagen Tripeptide
            </p>
            <p class="py-1">
                <svg class="w-5 inline-block" xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fillRule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clipRule="evenodd" />
                </svg>
                Mengandung  Vitamin C, Vitamin E dan 3 Asam Amino)
            </p>
            {{-- <div class="mt-8">
                <a href="#" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-200 transform bg-gray-900 rounded-md hover:bg-gray-700">Start Now</a>
            </div> --}}
        </div>
    </div>
</section> 
<!-- end section 2 -->

<!-- Section 3 -->    
<section class="dark:bg-hero-color lg:py-12 lg:flex lg:justify-center">
    <div class="dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:rounded-lg">
       
        <div class="max-w-full px-9 py-12 lg:max-w-5xl lg:w-1/2 gap-3 border border-red">
            <h3 class="text-bold py-2">Our Stars</h3>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-5xl font-Inter">Collagen Goes On And Always On</h2>
            
            <div class="py-5 text-center inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">1,500</h6>
                <p class="text-sm tracking-wides px-2  text-gray-800 capitalize">
                  Sold Product
                </p>
            </div>
            <div class="py-5 text-center inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">500</h6>
                <p class="text-sm tracking-widest px-2 text-gray-800 capitalize">
                    Positive Feedback
                </p>
            </div>

            <div class="py-5 text-center inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">400</h6>
                <p class="text-sm tracking-widest px-2 text-gray-800 capitalize">
                    Official Store
                </p>
            </div>
           
            <div class="mt-8 py-7">
                <a href="#" class="px-3 py-4 
                    text-white 
                     transition-colors duration-200 transform
                    bg-bg-tombol">
                    Get Special Promo
                </a>
            </div>
        </div>
        <div class="rectangle-2 lg:max-w-1/2">
            <div class="img-2">
                <img src="{{asset('images/produk-section3.png')}}" alt="" srcset="">
            </div>
       </div>
    </div>
</section>
<!-- Section 3 -->  

<!--Section 4 -->
<section class="py-20 mt-20">
    <!-- heading -->
    <div class="sm:3/4 mx-auto">
        <h2 class="py-2 font-Inter text-sm text-center text-gray-500">Our Features</h2>
        <h1 class="text-3xl text-center text-gray-600 font-Inter">
            Variety of Ingredients
        </h1>
    </div>
    <div class="container 
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 px-11">
     <div class="flex flex-col gap-0 border border-gray-900 h-80">
         <div class="flex flex-col items-center w-full h-full">
          <iframe 
            class="h-80 w-full"
            src="https://www.youtube.com/embed/5Vuxns6RILk"
            allow="accelerometer; autoplay; 
              clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowFullScreen
            frameborder="0"
            >
          </iframe>
         </div>
     </div>
     <div class="flex flex-col gap-0 border border-bg-tombol h-80 ">
        <div class="flex flex-col items-center w-full h-full bg-bg-pink  ">
            <h1 class="items-center capitalize py-3 font-bold font-Inter text-4xl">Fresh Veggie</h1>
            <p class="items-center font-Inter text-2xl mx-5 py-3">We offer the following services</p>
            <div class="mt-8">
                <a href="#" class="px-2 py-2 
                    rounded
                    transition-colors duration-200 transform bg-bg-btn border 
                    border-bg-tombol
                    text-pink-aktif
                    ">
                    Discover Now
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-gray-900 h-80">
        <div class="flex flex-col items-center w-full h-full">
          <iframe 
          class="h-80 w-full"
          src="https://www.youtube.com/embed/5Vuxns6RILk"
          allow="accelerometer; autoplay; 
            clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowFullScreen
          frameborder="0"
          >
        </iframe>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-bg-tombol h-80 ">
        <div class="flex flex-col items-center w-full h-full bg-bg-pink  ">
            <h1 class="items-center capitalize py-3 font-bold font-Inter text-4xl">Fresh Veggie</h1>
            <p class="items-center font-Inter text-2xl mx-5 py-3">We offer the following services</p>
            <div class="mt-8">
                <a href="#" class="px-2 py-2 
                    rounded 
                    transition-colors duration-200 transform bg-bg-btn border 
                    border-bg-tombol
                    text-pink-aktif
                    ">
                    Discover Now
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-bg-tombol h-80 ">
        <div class="flex flex-col items-center w-full h-full bg-bg-pink  ">
            <h1 class="items-center capitalize py-3 font-bold font-Inter text-4xl">Fresh Veggie</h1>
            <p class="items-center font-Inter text-2xl mx-5 py-3">We offer the following services</p>
            <div class="mt-8">
                <a href="#" class="px-2 py-2 
                    rounded 
                    transition-colors duration-200 transform bg-bg-btn border 
                    border-bg-tombol
                    text-pink-aktif
                    ">
                    Discover Now
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-gray-900 h-80">
        <div class="flex flex-col items-center w-full h-full">
          <iframe 
          class="h-80 w-full"
          src="https://www.youtube.com/embed/5Vuxns6RILk"
          allow="accelerometer; autoplay; 
            clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowFullScreen
          frameborder="0"
          >
        </iframe>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-bg-tombol h-80 ">
        <div class="flex flex-col items-center w-full h-full bg-bg-pink  ">
            <h1 class="items-center capitalize py-3 font-bold font-Inter text-4xl">Fresh Veggie</h1>
            <p class="items-center font-Inter text-2xl mx-5 py-3">We offer the following services</p>
            <div class="mt-8">
                <a href="#" class="px-2 py-2 
                    rounded 
                    transition-colors duration-200 transform bg-bg-btn border 
                    border-bg-tombol
                    text-pink-aktif
                    ">
                    Discover Now
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-0 border border-gray-900 h-80">
        <div class="flex flex-col items-center w-full h-full">
          <iframe 
          class="h-80 w-full"
          src="https://www.youtube.com/embed/XTtnS7cqH_s"
          allow="accelerometer; autoplay; 
            clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowFullScreen
          frameborder="0"
          >
        </iframe>
        </div>
    </div>
     

       
    </div>
    
</section>
 <!--Section 4 -->

<!-- section 5 -->
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
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 px-11 gap-4">
        @foreach($popular->groupBy('id_item') as $items)
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
            <h2 class="text-2xl mt-3 font-Inter">{{$itm[0]->item_name}}</h2>
            <p class="text-center font-Inter text-sm text-gray-500">Terjual {{$itm[0]->total_sold}}</p>
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
                <a href="{{route('detail_shop',[$itm[0]->id_item,$itm[0]->id_category_item])}}" class="px-2 py-2 
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
<!-- section 5 -->

<!-- section 6 -->
<section class="py-5">
    <div class="container 
        grid grid-cols-1 px-11 gap-4">
        <div class="mx-auto w-full">
            <div class="flex flex-wrap w-full bg-gray-100 py-32 px-10 relative mb-4">
              <img alt="gallery" 
                class="w-full object-cover h-full object-center block  absolute inset-0" 
                src="{{asset('images/Rectangle 81.png')}}">
              <div class="text-center relative z-10 justify-center w-full">
                <h2 class="text-2xl text-white font-Inter mb-2 text-5xl font-bold">
                    Veggie Foods? Ingredients You Want To Try
                </h2>
               
                <div class="mt-8">
                    <a href="#" class="px-5 py-4  
                        text-white text-sm transition-colors duration-200 transform bg-bg-tombol rounded">
                       Get Started
                    </a>
                </div>

              </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('js')
    
@endpush

