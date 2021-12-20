@extends('layouts.frontend.app')

@section('title','Detail')
    
@push('css')
    <link href={{asset('vendors/smart-form/smart-formsUI.css')}} rel='stylesheet'/>
    <link href={{asset('vendors/css/shop-style.css')}} rel="stylesheet">
    <style>
     /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
 </style>    
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

<section class="py-12 px-12">
  <div class="container grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 mx-auto">
          <div class="">
              <img 
              class=" shadow-sm dark:bg-gray-800 w-80 mx-auto h-80 object-cover justify-center"
              src="{{asset('image/product')}}/{{$detail[0]->photo}}" 
              alt="" id="main">
              {{-- @if($detail[0]->video != null) --}}
              {{-- <iframe 
                  class="shadow-sm dark:bg-gray-800 w-80 mx-auto h-80 object-cover justify-center"
                  src="{{asset('video/product')}}/{{$detail[0]->video}}"
                  allow="accelerometer; autoplay; 
                    clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowFullScreen
                  frameborder="0"
                  id="second"
                  style="display: none"
                  >
              </iframe>
              @endif --}}

              
              <div class="mx-auto py-3 items-center justify-center">
                @foreach($detail as $det)
                <img
                class="w-1/5 h-24 mx-2 mt-2 rounded border-gray-300 inline-block text-center object-center object-cover
                items-center justify-center shadow-sm cursor-pointer"
                 src="{{asset('image/product')}}/{{$det->photo}}" alt="" onclick="change(this.src)">
                 
                @endforeach
              </div>
           

          </div>
    
          <div class="">
            
            <h1 class="text left px-3 font-Roboto">{{$detail[0]->item_name}}</h1>
            <div class="inline items-center justify-center px-2">
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
            </div>
            <hr class="h-px my-4 bg-bookmark-white border-none  dark:bg-white-700 "/>

            @if(!empty(Auth::user()->id))
              @if(auth()->user()->id_role == 3)
                <h2 class="text-bookmark-foot text-2xl font-bold font-Roboto inline px-2">Rp {{number_format($detail[0]->price-($total*$detail[0]->price))}}</h2>
                <del class="text-bookmark-white text-lg font-Roboto inline px-2">Rp {{number_format($detail[0]->price)}}</del>
                <p class="inline text-blue-500 text-xl px-2 font-Roboto font-bold">Diskon {{$total * 100 }}%</p>
                <p class="inline text-sm px-2 font-Roboto text-bg-tombol">Min.Pembelian {{ $limit}}</p>
              @else
                <h2 class="text-bookmark-foot text-2xl font-bold font-Roboto inline px-2">Rp {{number_format($detail[0]->price)}}</h2>
                <p class="inline text-blue-500 text-xl px-2 font-Roboto font-bold">Diskon 0%</p>
                <p class="inline text-sm px-2 font-Roboto text-bg-tombol">Min.Pembelian {{ $limit}}</p>

              @endif
            @else
              <h2 class="text-bookmark-foot text-2xl font-bold font-Roboto inline px-2">Rp {{number_format($detail[0]->price)}}</h2>
              <p class="inline text-blue-500 text-xl px-2 font-Roboto font-bold">Diskon 0%</p>
              <p class="inline text-sm px-2 font-Roboto text-bg-tombol">Min.Pembelian {{ $limit}}</p>

            @endif
            <hr class="h-px my-4 bg-bookmark-white border-none ">

            <div class="grid grid-cols-1 px-3 lg:grid-cols-2 justify-center">
              <div class=" ">
                  <p class="font-Roboto text-lg text-bookmark-black">Availability:</p>
                  <p class="font-Roboto text-lg text-bookmark-black">Category:</p>
                  <p class="font-Roboto text-lg text-bookmark-black">Free shipping</p>
              </div>
              <div class="">
                <p class="font-Roboto text-lg text-bookmark-black">{{$detail[0]->total_stock}}</p>
                  <p class="font-Roboto text-lg text-bookmark-black">{{$detail[0]->category_name}}</p>
                
              </div>
            </div>

            <hr class="h-px my-4 bg-bookmark-white border-none ">
            <div class="mx-2 inline ">
              <form method="POST" action="{{route('add_cart')}}"  class="pt20">
                @csrf
                <input type="hidden" name="id_item" value={{$detail[0]->id_item}}>
                <input type="hidden" name="diskon" value={{$detail[0]->price-($total*$detail[0]->price)}}>
                <input type="hidden" name="limit" id="" value={{$limit}}>
                <input type="hidden" name="harga_default" value="{{$detail[0]->price}}">

                <button class="py-3 bg-bookmark-btn-min-plus text-black px-3 z-auto" id="minus" >-</button>
                <input 
                    class="bg-bookmark-btn-min-plus text-black w-24 py-3 text-center z-auto"
                    type="text" name="quantity" value="1" id="input" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                <button
                  class="py-3 bg-bookmark-btn-min-plus text-black px-3 z-auto"
                  id="plus">+</button>

                <button type="submit" 
                  class="
                  float-right
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
              </form>
            </div>
          </div>

          <div class="">
            <!-- best seller -->
            <h2 class="text-left px-7 text-bookmark-white  font-Roboto text-lg">Best Seller</h2>
            <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
              <img class="object-cover w-full h-48 mt-2" 
                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=320&q=80" alt="NIKE AIR">
        
                
                <div class="px-4 py-2 h-28">
                    <div class="text-3xl 
                    text-center font-bold 
                    text-gray-800 uppercase dark:text-white mb-3">
                        <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                          <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                          <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                          <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                          <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                    </div>
                    <p class="px-2 text-lg text-bg-tombol dark:text-bg-tombol  text-center inline">Rp 50.000</p>
                    <del class="px-2 text-sm text-bookmark-white dark:text-bg-bookmark-white  text-center inline">Rp 100.000</del>
                </div>
            </div>
    
            <!-- best seller -->  
          </div>

        </div> 
  <!-- Tab -->
  <div class="container mx-auto">
      <div class="flex lg:w-2/3 xs:w-1/2">
         <!-- Tab -->
        
         <div x-data="{
          activeTab:1,
          activeClass:'h-2 px-2 py-5  text-sm text-center text-bg-tombol bg-transparent border-b-2 border-bg-tombol sm:text-base dark:border-bg-tombol dark:text-bg-tombol whitespace-nowrap focus:outline-none',
          inactiveClass:'h-2 px-2 py-5 text-sm text-center sm:text-base dark:border-bg-tombol dark:text-bg-tombol whitespace-nowrap focus:outline-none'
          }"class="border-b border-gray-200 dark:border-gray-700">
          <button x-on:click="activeTab = 1" :class="activeTab === 1 ? activeClass : inactiveClass">
              Description
          </button>

          <button x-on:click="activeTab = 2" :class="activeTab === 2 ? activeClass : inactiveClass">
              Payment Method
          </button>

          <div class=" relative">
              <div x-show="activeTab === 1" class="px-4 py-3 border-2 
              h-2/5 bg-bookmark-tab">
                {!! $detail[0]->detail_product !!}
              </div>
              <div x-show="activeTab === 2" class="px-4 py-3 border-2 
              h-2/5 bg-bookmark-tab">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum sed quam et maximus. Nulla consectetur nisl sit amet massa aliquet condimentum. Nulla tincidunt vel lectus quis tincidunt. Quisque et dui tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur lobortis eu felis a auctor. Nam diam urna, ultricies quis auctor non, ultrices a felis. Suspendisse eget fermentum magna, quis facilisis magna. Integer luctus blandit posuere. Quisque sit amet odio massa. Suspendisse dignissim eu eros nec molestie. Sed interdum mi in felis aliquet, quis varius dolor dictum.

                  Nunc sodales vehicula diam, ac venenatis tortor suscipit quis. Integer aliquam mattis sem at aliquam. Proin placerat quam vehicula, molestie lorem eget, volutpat mauris. Aenean finibus ultricies suscipit. Maecenas euismod tortor id turpis tincidunt fringilla. Mauris consectetur ultricies dignissim. Pellentesque sed dui ac tellus viverra laoreet id vel mi. Nunc rutrum ante et dolor sollicitudin egestas. Curabitur quis lacinia mi.

                  Sed ut nunc mi. Cras ut consectetur est, eget ornare magna. Mauris finibus porta orci, at dignissim nulla consequat sed. Ut posuere nunc vitae leo fermentum viverra. Mauris id urna a sem convallis fermentum id at dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin eget dignissim urna, et tempor enim. Quisque enim orci, hendrerit eget metus vel, facilisis malesuada tortor. Maecenas pretium dapibus faucibus. Praesent in erat enim. Fusce faucibus sit amet lorem quis facilisis. Nam sed enim vitae est gravida luctus nec in turpis.
              </div>
          </div>

      </div>
      <!-- end tab -->
      </div>

  </div>
<!-- Tab -->
</section>


<section class="py-20 ">
    <!-- heading -->
    <div class="sm:3/4 mx-auto px-11">
        <h1 class="text-3xl text-center text-gray-600 font-Roboto-700">
           Related Product
        </h1>
    </div>
    <!-- Product -->
    <div class="container 
        grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16 gap-4 px-5 justify-center">
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
          <div class="items-center mx-auto mt-8 max-h-48">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm"
            src="{{asset('images/produk-section1.jpg')}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="py-4">
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
        
        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
          <div class="items-center mx-auto mt-8 max-h-48">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm"
            src="{{asset('images/produk-section1.jpg')}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="py-4">
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
        
          

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
          <div class="items-center mx-auto mt-8 max-h-48">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm"
            src="{{asset('images/produk-section1.jpg')}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="py-4">
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
        
          

        <div class="flex flex-col border border-gray-300 h-max hover:border-bg-tombol border-2 shadow-md">
          <div class="items-center mx-auto mt-8 max-h-48">
            <img 
            class="rounded-full w-48 h-48 justify-center object-cover object-center items-center shadow-sm"
            src="{{asset('images/produk-section1.jpg')}}" alt="">
          </div>

          <div class="items-center mx-auto mt-5 justify-center">
            <span class="inline-block flex overflow-hidden ">
                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
            </span>
          </div>

          <div class="px-12 text-center sm:px-0 w-full">
            <h2 class="text-xl mt-3">Summer Veganie</h2>
            <del class="text-sm">Rp 100.000</del>
            <h3 class="text-2xl text-bg-tombol">Rp 50.000</h3>
            <div class="py-4">
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

     <!-- init cubeportfolio -->
     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
     <script type="text/javascript" src="{{asset('vendors/js/cube-thumb-slider.js')}}"></script>

     <script type="text/javascript">
        const change = src => {
            document.getElementById('main').src = src
        }
      </script>

     


     <script>
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('input');

        minusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        if(currentValue < 2 )
        inputField.value = 1;
        else
        inputField.value = currentValue - 1;
        });

        plusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
        inputField.value = currentValue + 1;
        });


    </script>
@endpush