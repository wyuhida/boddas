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
      <div class="no-tailwindcss-base">
        {!! $sp->content_name!!}
      </div>
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
 
<div class="w-full">
  
  <div class="sm:3/4 md:w-full mx-auto md:flex-col">
    <h2 class="py-2 font-Inter text-sm text-center text-gray-500">Testimoni</h2>
    <h1 class="text-3xl text-center text-gray-600 font-Roboto capitalize">
       cerita sukses konsumen boddas
    </h1>
  </div>

  
  <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4"> 
    <div class=" w-full relative flex items-center justify-center">
        <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
            <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-4 items-center justify-start transition ease-out duration-700">
              @foreach($section_t as $st)
                <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                    <img class="md:w-80 md:h-80 shadow-md" src={{URL::asset("image/testimoni/{$st->image}")}} alt="black chair and white table" class="object-cover object-center w-full" />
                </div>
              @endforeach
                {{-- <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                  <img class="md:w-80 md:h-80" src="{{asset('images/test1.jpeg')}}" alt="black chair and white table" class="object-cover object-center w-full" />
    
                </div>
                <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                  <img class="md:w-80 md:h-80" src="{{asset('images/test1.jpeg')}}" alt="black chair and white table" class="object-cover object-center w-full" />
    
                </div>
                <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                  <img class="md:w-80 md:h-80" src="{{asset('images/test1.jpeg')}}" alt="black chair and white table" class="object-cover object-center w-full" />
    
                </div>
                <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                  <img class="md:w-80 md:h-80" src="{{asset('images/test1.jpeg')}}" alt="black chair and white table" class="object-cover object-center w-full" />
                </div> --}}
            </div>
        </div>
        <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
            <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
  </div>


</div>

<!-- promo 3 -->
<section class="py-5 mt-5">
  <!-- heading -->
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
    {{-- <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
      <div class="flex flex-col items-center w-full h-full">
        <iframe 
          class="h-80 w-full shadow-md rounded"
          src="https://www.youtube.com/embed/5Vuxns6RILk"
          allow="accelerometer; autoplay; 
            clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowFullScreen
          frameborder="0"
          >
        </iframe>
      </div>
    </div>
  <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
    <div class="flex flex-col items-center w-full h-full">
     <iframe 
       class="h-80 w-full shadow-md rounded"
       src="https://www.youtube.com/embed/5Vuxns6RILk"
       allow="accelerometer; autoplay; 
         clipboard-write; encrypted-media; gyroscope; picture-in-picture"
       allowFullScreen
       frameborder="0"
       >
     </iframe>
    </div>
  </div> --}}
  {{-- <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
    <div class="flex flex-col items-center w-full h-full">
    <iframe 
      class="h-80 w-full shadow-md rounded"
      src="https://www.youtube.com/embed/5Vuxns6RILk"
      allow="accelerometer; autoplay; 
        clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowFullScreen
      frameborder="0"
      >
    </iframe>
    </div>
  </div>
  <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
    <div class="flex flex-col items-center w-full h-full">
    <iframe 
      class="h-80 w-full shadow-md rounded"
      src="https://www.youtube.com/embed/5Vuxns6RILk"
      allow="accelerometer; autoplay; 
        clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowFullScreen
      frameborder="0"
      >
    </iframe>
    </div>
  </div>
  <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
    <div class="flex flex-col items-center w-full h-full">
    <iframe 
      class="h-80 w-full shadow-md rounded"
      src="https://www.youtube.com/embed/5Vuxns6RILk"
      allow="accelerometer; autoplay; 
        clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowFullScreen
      frameborder="0"
      >
    </iframe>
    </div>
  </div>
  <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
    <div class="flex flex-col items-center w-full h-full">
    <iframe 
      class="h-80 w-full shadow-md rounded"
      src="https://www.youtube.com/embed/5Vuxns6RILk"
      allow="accelerometer; autoplay; 
        clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowFullScreen
      frameborder="0"
      >
    </iframe>
    </div>
  </div>
  <div class="flex flex-col border border-gray-100  rounded shadow-md h-80">
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
  </div> --}}
 
  
</section>

@endsection

@push('js')
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

