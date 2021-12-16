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
    
 <section class="bg-hero-color dark:bg-gray-800 relative">
    <div class="container lg:px-8 mx-auto flex flex-col md-col-1 lg-col-2">
        <div class="items-center lg:flex">
           
            <div class="mt-auto lg:mt-0 lg:w-1/2 px-12 mb-12">
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

          <div class="lg:w-1/2 px-12 mb-10">
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
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 px-11 gap-4">
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
          <div class="items-center mx-auto mt-8">
            <img 
            class="rounded-full w-fit-content"
            src="{{asset('images/pisang.png')}}" alt="">
          </div>
          <div class="items-center mx-auto mt-4 justify-center">
            <span class="inline-block flex overflow-hidden ">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
            </span>
          </div>
          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="mt-8 py-5">
                <a href="#" class="px-2 py-2 
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
        
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/pepaya.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/alpukat.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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
                <p class="text-sm tracking-wides px-4  text-gray-800 capitalize">
                  Sold Product
                </p>
            </div>
            <div class="py-7 text-center  inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">500</h6>
                <p class="text-sm tracking-widest px-4 text-gray-800 capitalize">
                    Positive Feedback
                </p>
            </div>

            <div class="py-7 text-center  inline-block">
                <h6 class="font-bold font-Inter text-pink-aktif text-3xl">400</h6>
                <p class="text-sm tracking-widest px-4 text-gray-800 capitalize">
                    Official Store
                </p>
            </div>
           
            <div class="mt-8">
                <a href="#" class="px-5 py-5  text-white transition-colors duration-200 transform bg-bg-tombol">
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
    <div class="container 
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 px-11 gap-4">
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
          <div class="items-center mx-auto mt-8">
            <img 
            class="rounded-full w-fit-content"
            src="{{asset('images/pisang.png')}}" alt="">
          </div>
          <div class="items-center mx-auto mt-4 justify-center">
            <span class="inline-block flex overflow-hidden ">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
               <img src="{{asset('images/star1.png')}}" alt="" srcset="">
            </span>
          </div>
          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="mt-8 py-5">
                <a href="#" class="px-2 py-2 
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
        
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/pepaya.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/alpukat.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2">
            <div class="items-center mx-auto mt-8">
              <img 
              class="rounded-full w-fit-content"
              src="{{asset('images/jeruk.png')}}" alt="">
            </div>
            <div class="items-center mx-auto mt-4 justify-center">
              <span class="inline-block flex">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
                <img src="{{asset('images/star1.png')}}" alt="" srcset="">
              </span>
            </div>
            <div class="px-12 text-center sm:px-0 w-full">
              <h2 class="text-xl">Summer Veganie</h2>
              <del class="text-sm">Rp 100.000</del>
              <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
              <div class="mt-8 py-5">
                  <a href="#" class="px-2 py-2 
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

    </div>
    <!-- end product -->
</section>

@endsection
@push('js')
    
@endpush