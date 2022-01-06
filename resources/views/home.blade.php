@extends('layouts.frontend.app')
@section('title','Home')
@push('css')
<!-- Swiper's CSS -->
<link
rel="stylesheet"
href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
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
  <section class="">
    <div class="bg-hero-color">
      <div class="
        flex 
        flex-col 
        w-full 
        lg:w-full 
        lg:flex-row
        lg:px-11
        ">
        <div class="
          w-full
          lg:w-1/2
          ">
          <h2 class="
                      text-4xl 
                      my-10
                      font-bold
                      text-center
                      font-Inter-600
                      lg:text-left capitalize
                      ">
                      Pertama di Indonesia
                      Minuman kolagen tanpa pewarna dan tanpa perasa
          </h2>
        
          {{-- <div class="flex mb-5 w-full justify-center lg:w-fit">
            <button type="button" 
                class="
                    text-white bg-bg-tombol 
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
          </div> --}}
      </div>
      <!-- Image -->
        <div class="
          flex 
          flex-col 
          items-center 
          justify-center 
          max-w-lg
          mx-auto 
          bg-gray-800
          h-fit
          -mb-20
          lg:mt-20
          ">
         
          <div class="w-full bg-center bg-cover rounded-lg shadow-md">
              <img class="object-cover" src={{URL::asset("images/bodas-cover.jpg")}} alt="">
          </div>
        </div>
      <!-- image -->
    </div>
    </div>
  </section>
 <!-- End Hero -->

 <section class="">
   <div class="mt-20 py-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
    <!-- Image 1 -->
     <div class="md:flex flex-row items-center py-5 grid-cols">
       <div class="
            flex justify-center flex-col md:flex-row 
            items-center 
            w-full
            md:px-5">
          <div class="rounded-full">
            <img
              class="rounded-full"
              src={{URL::asset('images/icon1.png')}} alt="" srcset="">
          </div>
          <div class="text-center w-full">
            <h6 class="mb-2 font-semibold leading-5 md:text-center text-lg">Quick Payment</h6>
            <h6 class="mb-2 font-semibold leading-5">Bebas Ongkir</h6>
            <p class="text-sm text-gray-900">
              Dengan Min Pembelian 2 Pack
            </p>
          </div>

       </div>
     </div>

     <!-- image 2 -->
      <div class="md:flex flex-row items-center py-5 grid-cols">
        <div class="
          flex 
          w-full justify-center 
          flex-col 
          items-center 
          md:px-5 
          md:flex-row
          ">
          <div class=" rounded-full">
            <img
              class="rounded-full"
              src={{URL::asset('images/icon2.png')}} alt="" srcset="">
          </div>
          
           <div class="text-center w-full">
            <h6 class="mb-2 font-semibold leading-5 md:text-center text-lg">Quick Payment</h6>
            <p class="text-sm text-gray-900 md:text-center">
              100% Pembayaran Aman
            </p>
           </div>
          
        </div>
      </div>

      <!-- image 3 -->
      <div class="md:flex flex-row items-center py-5 grid-cols">
        <div class="
          flex justify-center 
          flex-col
          w-full
          md:flex-row items-center 
          md:px-5 ">
          <div class="rounded-full">
            <img
              class="rounded-full"
              src={{URL::asset('images/icon3.png')}} alt="" srcset="">
          </div>
          <div class="text-center w-full">
            <h6 class="mb-2 font-semibold leading-5 text-lg">Promo Spesial</h6>
            <p class="text-sm text-gray-900">
              Dapatkan Promo Spesial
            </p>
          </div>
        </div>
      </div>

     <div class="md:flex flex-row items-center py-5 grid-cols">
        <div class="
          flex justify-center 
          flex-col 
          w-full
          md:flex-row 
          items-center md:px-5 
         ">
          <div class=" rounded-full">
            <img
              class="rounded-full"
              src={{URL::asset('images/icon4.png')}} alt="" srcset="">
          </div>
          <div class="text-center w-full">
            <h6 class="mb-2 font-semibold leading-5 text-lg">24/7 Support</h6>
            <p class="text-sm text-gray-900">
              Ready support
            </p>
          </div>
        </div>
      </div>

   </div>
 </section>

 <!-- promo 1 -->

 @foreach($section_p as $key => $sp)
 @if ($key % 2 == 0)
 <div class="
    flex 
    flex-col 
    w-full
    mb-5
    items-center
    justify-center
    lg:flex-row
    lg:px-11
    ">
    <div class="
      flex
      flex-row 
      w-full
      h-96
      bg-hero-color
      justify-end
      object-cover
      md:w-4/5
      md:h-4/5
      ">
        <img 
        class="w-80 my-5 shadow-md md:w-4/5 md:h-96"
        src={{URL::asset("image/promosi/{$sp->image}")}} alt="" srcset="">
    </div>
    <div class="
      flex 
      flex-col 
      bg-gray 
      w-full
      px-11
      ">
      <div class="py-2">
        {!! $sp->content_name!!}
      </div>
      @if($sp->link_url != null)
      <div class="w-fit rounded my-5 ">
        <a href="{{$sp->link_url}}" class="no-underline hover:no-underline hover:bg-bookmark-foot hover:text-white py-3 px-3 border bg-bg-tombol rounded text-Inter font-semibold text-white">Klik Disini</a>
      </div>
      @endif

    </div>
 </div> 
@else
  <!-- promo 2 -->
  <div class="
    flex 
    flex-col 
    w-full
    mb-5
    items-center
    justify-center
    lg:flex-row
    lg:px-11
    bookmark-section-white
    ">
   
    <div class="
      flex 
      flex-col 
      bg-gray 
      w-full
      px-11
      ">
      <div class="no-tailwindcss-base py-2">
        {!! $sp->content_name!!}
      </div>
      @if($sp->link_url != null)
      <div class="w-fit rounded my-5 ">
        <a href="{{$sp->link_url}}" class="no-underline hover:no-underline hover:bg-bookmark-foot hover:text-white py-3 px-3 border bg-bg-tombol rounded text-Inter font-semibold text-white">Klik Disini</a>
      </div>
      @endif
    </div>
    <div class="
        flex
        flex-row 
        w-full
        h-96
        justify-center
        object-cover
        md:w-4/5
        md:h-4/5
        ">
      <img 
      class="w-80 my-5 shadow-lg md:w-4/5 md:h-96"
      src={{URL::asset("image/promosi/{$sp->image}")}} alt="" srcset="">
    </div>
  </div> 
@endif
@endforeach
 
<!-- testimoni -->
@if($section_t != null)
<div class="md:px-10 mx-auto">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      {{-- <div class="swiper-slide">
        <img
          class="object-center w-full h-96 md:w-80 md:h-80 shadow-md"
          src="https://source.unsplash.com/user/erondu/3000x900"
          alt="apple watch photo"
        />
      </div>
      <div class="swiper-slide p-4">
        <img
          class="object-center w-full h-96 md:w-80 md:h-80 shadow-md"
          src="https://source.unsplash.com/collection/190727/3000x900"
          alt="apple watch photo"
        />
      </div>
      <div class="swiper-slide p-4">
        <img
          class="object-center w-full h-96 md:w-80 md:h-80 shadow-md"
          src="https://source.unsplash.com/collection/190728/3000x900"
          alt="apple watch photo"
        />
      </div>
      <div class="swiper-slide p-4">
        <img
          class="object-center w-full h-96 md:w-80 md:h-80 shadow-md"
          src="https://source.unsplash.com/collection/190728/3000x900"
          alt="apple watch photo"
        />
      </div> --}}
      @foreach($section_t as $st)
      <div class="swiper-slide p-2">
        <div class="flex flex-col rounded shadow overflow-hidden">
          <div class="flex-shrink-0">
            <img class="h-80 w-full object-center" src="{{URL::asset("image/testimoni")}}/{{$st->image}}" alt="">
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</div>
@endif


<!-- promo Video -->
{{-- <section class="py-5 mt-5">
 
  <div class="sm:3/4 mx-auto">
      <h2 class="py-2 font-Inter text-sm text-center text-gray-500"></h2>
      <h1 class="text-3xl text-center text-gray-600 font-Inter">
          Video
      </h1>
  </div>
  <div class="container 
      grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 mt-16 px-11 gap-5">
      @foreach($section_v as $sv)
   <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
       <div class="flex flex-col items-center w-full h-full">
        
            <iframe 
            class="h-80 w-full shadow-md rounded"
            src="{{$sv->link_url}}"
            allow="accelerometer; autoplay; 
              clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowFullScreen
            frameborder="0">
          </iframe>
       
       </div>
   </div>
   @endforeach
</section> --}}

@if($section_v != null)
<section class="py-5 mt-5">
  <div class="sm:3/4 mx-auto">
    <h2 class="py-2 font-Inter text-sm text-center text-gray-500"></h2>
    <h1 class="text-3xl text-center text-gray-600 font-Inter">
        Video
    </h1>
  </div>

  <div class="md:px-10 mx-auto mt-16">
    <div class="swiper mySwipers">
      <div class="swiper-wrapper">
        @foreach($section_v as $sv)
        <div class="swiper-slide p-2">
          <div class="flex flex-col rounded shadow overflow-hidden">
            <div class="flex-shrink-0">
              <iframe 
              class="h-80 w-full shadow-md rounded"
              src="{{$sv->link_url}}"
              allow="accelerometer; autoplay; 
                clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowFullScreen
              frameborder="0">
            </iframe>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
@endif

{{-- <section class="py-5 mt-5">
  <div class="sm:3/4 mx-auto">
    
    <h1 class="text-6xl text-center text-gray-600 font-Inter">
        FAQ
    </h1>
    <h2 class="py-2 font-Inter text-lg text-center text-gray-500">Paling sering di tanyakan</h2>
  </div>

  <div class="md:px-10 mx-auto mt-16" x-data="{selected:1}">

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm  overflow-hidden ">
        <div class="flex-shrink-0 ">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
            border-bg-tombol" @click="selected !== 1 ? selected = 1 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                ini apa sih ? herbal ya ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Lebih tepatnya ini adalah minuman yang mengandung super kolagen dan super anti oksidan, 
              untuk memperbaiki peremajaan kulit dari dalam. Bentuknya serbuk sachet, 
              diminum seperti menyeduh susu
             </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
            border-bg-tombol" @click="selected !== 2 ? selected = 2 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Apa sudah ada izinnya ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Tentu saja boddasfam ! kami tidak berani berbisnis yang illegal. Boddas Collagen Drink sudah terdaftar di BPOM RI MD 867028042317 anda bisa cek langsung ke website resmi BPOM.
             </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 3 ? selected = 3 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau saya order, apakah barang pasti dikirim ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Tentu saja. Kita berbisnis jangka Panjang, bukan asal-asalan. Nanti setelah kakak order, kami kirimkan invoice pembelian serta rekening yang kakak transfer adalah  REKENING PERUSAHAAN, Jadi pembelian kakak AMAN.             </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-2">
      <div class="flex flex-col rounded shadow-sm overflow-hidden">
        <div class="flex-shrink-0">
          <button type="button" 
            class="w-full px-8 py-6 text-left border-b-2
             border-bg-tombol" @click="selected !== 4 ? selected =4 : selected = null">
            <div class="flex justify-between">
              <span class="font-Roboto-600 text-lg text-bg-tombol font-semibold capitalize">
                Kalau barang tidak sampai bagaimana ?
              </span>
            </div>
          </button>
         

          <div class="overflow-hidden transition-all max-h-0 duration-700" x-ref="container1" 
          x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            <div class="p-6">
             <p class="font-Inter">
              Jika ada kerusakan isi ataupun kehilangan dalam perjalanan, pasti kami ganyi 100%            </div>
          </div>
        </div>
      </div>
    </div>

 

      
  </div>
</section> --}}

@endsection

@push('js')

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.mySwiper', {
    spaceBetween: 30,
    longSwipesRatio:0.5,
    loop:true,
    centeredSlides: true,
    margin:0,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 50,
          height:50,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
          height:30,
        },
        1024: {
          slidesPerView: 3,
          height:30,
        },
      },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>

<script>
  var swiper = new Swiper('.mySwipers', {
    spaceBetween: 30,
    longSwipesRatio:0.5,
    loop:true,
    centeredSlides: true,
    margin:0,
    autoplay: {
      delay: 2700,
      disableOnInteraction: false,
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 50,
          height:50,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
          height:30,
        },
        1024: {
          slidesPerView: 3,
          height:30,
        },
      },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>

{{-- <script>
  var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    spaceBetween:0,
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
          height:50,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 0,
          height:30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 5,
          height:30,
        },
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
  });
</script> --}}
  <script>
    let defaultTransform = 0;
      function goNext() {
          defaultTransform = defaultTransform - 398;
          var slider = document.getElementById("slider");
          if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
          slider.style.transform = "translateX(" + defaultTransform + "px)";
      }
        next.addEventListener("click", goNext);
        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 398;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        prev.addEventListener("click", goPrev);
  </script>
@endpush

