@extends('layouts.frontend.app')

@section('title','Detail')
    
@push('css')
    <link href={{asset('vendors/smart-form/smart-formsUI.css')}} rel='stylesheet'/>
    <link href={{asset('vendors/css/shop-style.css')}} rel="stylesheet">
@endpush

@section('content')
<?php
    use App\Http\Controllers\ShopController;
    if(ShopController::total_diskon() != null)
    {
        $stock_l = ShopController::total_diskon();
        $limit = $stock_l['stock_limit'];
        $total = $stock_l['discount_percentage'];
    }else{
        $limit = 0;
        $total = 0;
    }
   
?>
<section class="border border-gray-900 lg:py-12 px-12">
    <div class="grid grid-cols-1 border border-gray-700 w-3/4 lg:w-3/4 inline-grid">
        <div class="grid grid-cols-2 border border-gray-300 gap-2 ">
            <div class="
            border border-black
            ">
                <img 
                class="shadow-gray-800 shadow-xl"
                src="{{asset('images/produk-section1.jpg')}}" 
                alt="">
            </div>
            <div class="border border-pink-900">
               <div>
                   <h1 class="text left font-Roboto-500">Boddas Kolagen</h1>
                   <div class="inline px-2">
                        <svg class="w-5  inline" 
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <svg class="w-5  inline" 
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <svg class="w-5  inline" 
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <svg class="w-5 inline-block" 
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <svg class="w-5 inline" 
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                   </div>
                   <p class=" border border-blue-700 px-1 py-2 font-Roboto 
                   text-bookmark-white inline-block text-lg">0 Review</p>
                   <a href="#" class="
                    border border-blue-700 
                    text-bg-tombol
                    inline px-1 py-2">Submit Review</a>
               </div>
               <hr class="h-px my-4 bg-bookmark-white border-none 
               dark:bg-white-700">
               <h2 class="text-bookmark-foot text-2xl font-bold font-Roboto inline px-2">Rp 50.000</h2>
               <del class="text-bookmark-white text-xl font-Roboto inline px-2">Rp 100.000</del>
               <p class="inline text-blue-500 text-xl px-2 font-Roboto font-bold">Diskon 50%</p>

              <div class="grid grid-cols-2 border border-red-700">
                  <div class="px-2 mt-3">
                      <p class="font-Roboto text-lg text-bookmark-black px-3 mb-2">Availability:</p>
                      <p class="font-Roboto text-lg text-bookmark-black px-3  mb-2">Category:</p>
                      <p class="font-Roboto text-lg text-bookmark-black px-3  mb-2">Free shipping</p>
                  </div>
                  <div class="px-2 mt-3">
                      <p class="font-Roboto text-lg text-bookmark-black mb-2">In stock</p>
                      <p class="font-Roboto text-lg text-bookmark-black  mb-2">Food and Beverage</p>
                  </div>
              </div>
              <hr class="h-px my-4 bg-bookmark-white border-none ">
               
            </div>

            <div class="mx-auto py-3">
                <img
                class="w-24 mx-auto rounded border-gray-300 inline-block text-center object-center object-cover
                items-center justify-center"
                 src="{{asset('images/produk-section1.jpg')}}" alt="">
                 <img
                 class="w-24 mx-auto rounded border-gray-300 inline-block text-center object-center object-cover
                 items-center justify-center"
                  src="{{asset('images/produk-section1.jpg')}}" alt="">
                  <img
                  class="w-24 mx-auto rounded border-gray-300 inline-block text-center object-center object-cover
                  items-center justify-center"
                   src="{{asset('images/produk-section1.jpg')}}" alt="">
                   <img
                   class="w-24 mx-auto rounded border-gray-300 inline-block text-center object-center object-cover
                   items-center justify-center"
                    src="{{asset('images/produk-section1.jpg')}}" alt="">
            </div>

            <div class="py-10 inline relative">
                <button class="py-3 bg-bookmark-btn-min-plus text-black px-3 z-auto" id="minus">-</button>
                <input 
                    class="bg-bookmark-btn-min-plus text-black w-24 py-3 text-center z-auto"
                    type="number" name="number" value="0" id="input">
                <button
                class="py-3 bg-bookmark-btn-min-plus text-black px-3 z-auto"
                 id="plus">+</button>
                
                {{-- <button class="absolute px-8 w-fit py-3 bg-bookmark-btn-min-plus text-center inline right-0">
                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                    Beli
                </button> --}}

                <button type="button" 
                class="
                absolute
                right-0
                    text-white bg-bg-tombol 
                     hover:bg-bookmark-foot1 
                     focus:ring-4 
                     focus:ring-bookmark-foot
                     font-medium 
                     text-sm px-3 py-3 
                     text-center 
                     inline-flex 
                     items-center 
                     dark:bg-bookmark-foot1 dark:hover:bg-bookmark-foot
                      dark:focus:ring-bookmark-foot1
                      ">
                <svg class=" w-5 h-5 ml-2 -ml-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  BUY NOW
            </button>
            </div>
           
        </div>
        <!-- Tab -->
        <div class="border border-blue">
            <div class="flex border-b border-gray-200 dark:border-gray-700">
                <button class="
                    tablinks
                    h-10 px-4 py-2 -mb-px 
                    text-sm text-center 
                    text-blue-600 bg-transparent
                    border-b-2 border-blue-500 
                    sm:text-base dark:border-blue-400 
                    dark:text-blue-300 whitespace-nowrap focus:outline-none" 
                    onclick="openProduk(event,'produk-information')">
                    Product Information
                </button>
        
                <button class="h-10 px-4 py-2 
                    -mb-px text-sm text-center 
                    text-gray-700 bg-transparent 
                    border-b-2 border-transparent 
                    sm:text-base dark:text-white 
                    whitespace-nowrap cursor-base 
                    focus:outline-none hover:border-gray-400">
                    payment method
                </button>
        
                <button class="h-10 px-4 py-2 
                    -mb-px text-sm text-center 
                    text-gray-700 bg-transparent 
                    border-b-2 border-transparent 
                    sm:text-base dark:text-white 
                    whitespace-nowrap cursor-base 
                    focus:outline-none hover:border-gray-400">
                    Notifiaction
                </button>
            </div>
            <div class="tabContent invisible" id="produk-information">
              <p>Information</p>
            </div>
        </div>
        <!-- end tab -->
    </div>
    <div class="grid grid-cols-1 border border-blue w-1/4 float-right h-full">
        right bar
    </div>
</section>




@endsection
@push('js')
     <!-- init cubeportfolio -->
     <script type="text/javascript" src="{{asset('vendors/js/cube-thumb-slider.js')}}"></script>
        <script>
         ​  function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }
        </script>
  

     <script>
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('input');

        minusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        inputField.value = currentValue - 1;
        });

        plusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        inputField.value = currentValue + 1;
        });
    </script>
@endpush