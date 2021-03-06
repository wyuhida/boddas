@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')

    <!-- component -->
<section class="md:flex h-auto px-12 py-5">
    <div class=" flex-rows md:flex w-full h-auto border border-gray-300 shadow-md my-10 rounded-md gap-10">
        <div class="relative md:flex bg-bookmark-kontak h-[759.8px] md:w-1/2 hidden">
            <div class="flex sm:w-fit md:flex flex-row  ml-80 mt-28 w-48 overflow-hidden">
               <div class="flex flex-col items-center text-center">
                <h1 class="flex text-white font-Roboto-500 text-2xl capitalize font-bold leading-10">get in <br> touch</h1>
                <p class="text-white font-Roboto text-sm  py-2">boddas@gmail.com</p>
                <p class="text-white font-Roboto text-sm py-2">+62 811 2233 4455</p>
               </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="bg-bookmark-kontak absolute w-[125.19px] h-[131.33px] rounded-full  right-0 -mr-5"></div>
            </div>
            <div class="absolute left-0 bottom-0 w-fit -ml-12 ">
                <img
                class="object-cover h-[837px] " 
                src="images/kontak.png" alt="" srcset="">
            </div>
        </div>
       
        <!-- form -->
        <div class="flex flex-col md:w-1/2">
            <form action="{{route('store_kontak_us')}}" method="POST"
            class="py-5 mx-5">
                @csrf
                <div class="px-2">
                    <label for="fullname" class="
                        block mb-2 
                        text-sm 
                        font-Roboto
                        font-semibold
                        text-bg-tombol dark:text-bg-tombol">Nama Lengkap</label>
                    <input type="text" id="fullname" name="nama"
                        class="
                        bg-gray-50
                        border border-bg-tombol
                        block 
                        w-full 
                        h-[73.17px]
                        rounded-lg
                        hover:border-bg-tombol
                        focus:border-bg-tombol
                        active:border-bg-tombol
                        focus:ring
                        focus:ring-bg-tombol
                        focus:outline-none
                        capitalize
                        @error('nama') is-invalid @enderror" 
                        value="{{old('nama')}}"
                        placeholder="jhon doe">
                </div>
                @error('nama')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>                   
                @enderror
                
                <div class="my-3 px-2">
                    <label for="email" class=" 
                    block mb-2 
                    text-sm 
                    font-Roboto
                    font-semibold
                    text-bg-tombol dark:text-bg-tombol capitalize">email</label>
                    <input type="email" id="email" 
                        name="email"
                        class="
                        bg-gray-50
                        border border-bg-tombol
                        block 
                        w-full 
                        h-[73.17px]
                        rounded-lg
                        hover:border-bg-tombol
                        focus:border-bg-tombol
                        active:border-bg-tombol
                        focus:ring
                        focus:ring-bg-tombol
                        focus:outline-none
                        @error('email') is-invalid @enderror
                        " 
                        value="{{old('email')}}"
                        placeholder="jhon@mail.com">
                </div>
                    @error('email')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>                   
                    @enderror

                <div class="my-3 px-2">
                    <label for="email" class="
                    block mb-2 
                    text-sm 
                    font-Roboto
                    font-semibold
                    text-bg-tombol dark:text-bg-tombol capitalize"
                    >nomor HP / Whatsapp</label>
                    <input type="text" id="phone" 
                    name="nomor_hp"
                        class="
                        bg-gray-50
                        border border-bg-tombol
                        block 
                        w-full 
                        h-[73.17px]
                        rounded-lg
                        hover:border-bg-tombol
                        focus:border-bg-tombol
                        active:border-bg-tombol
                        focus:ring
                        focus:ring-bg-tombol
                        focus:outline-none
                        @error('nomor_hp') is-invalid @enderror" 
                        value="{{old('nomor_hp')}}"
                        placeholder="08123456789" >
                </div>
                @error('nomor_hp')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>                   
                @enderror

                <div class="my-3 px-2">
                    <label for="message" class="
                    block mb-2 
                    text-sm 
                    font-Roboto
                    font-semibold
                    text-bg-tombol dark:text-bg-tombol capitalize"
                    >Pesan</label>
                    <textarea id="message" 
                    name="pesan"
                        class="
                        bg-gray-50
                        border border-bg-tombol
                        block 
                        w-full 
                        h-[229.8px]
                        p-2.5 
                        rounded-lg
                        hover:border-bg-tombol
                        focus:border-bg-tombol
                        active:border-bg-tombol
                        focus:ring
                        focus:ring-bg-tombol
                        focus:outline-none
                        @error('pesan') is-invalid @enderror
                        "placeholder="Message">
                        {{old('pesan')}}"</textarea>
                </div>
                
                    @error('pesan')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>                   
                    @enderror

                <button type="submit" 
                    class="
                        text-white 
                        bg-bg-tombol 
                        hover:bg-bg-tombol
                        focus:ring-4 
                        focus:ring-bg-tombol 
                        font-medium 
                        rounded-lg 
                        text-sm 
                        w-full 
                        sm:w-auto 
                        px-5 
                        py-2.5 
                        text-center 
                        dark:bg-bg-tombol 
                        dark:hover:bg-bg-tombol 
                        dark:focus:ring-bg-tombol 
                        md:float-right
                        ">Submit</button>

            </form>
        </div>
        <!-- form -->
    </div>
    
</section>

@endsection
{{-- AIzaSyAMwVpUj3-oHHW8N21819BhKttOga2Rj2s --}}
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
<script src="{{asset('vendors/js/jquery.gmap.min.js')}}"></script> 
<script>
    // Marker Map
    $(document).ready(function () {
        map = new GMaps({
            scrollwheel: false,
            el: '#markermap',
            lat: 26.981942,
            lng: 75.684486

        });
        map.addMarker({
            lat: 26.981942,
            lng: 75.684486,
            title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<h4>GUNJAN SOFTWARE</h4><p>A Small Web design Studio</p>'
            }
        });
    });
</script> 
@endpush