@extends('layouts.frontend.app')
@section('title','Pembayaran')

@push('css')
    <link href="{{asset('vendors/css/shop-style.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/smart-form/smart-formsUI.css')}}" rel='stylesheet'/>
    <link href="{{asset('vendors/css/shop-style.css')}}" rel="stylesheet">
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
    <div class="container mx-auto px-4 w-full bg-white">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal"></th>
                                <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">product</th>
                                <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">price</th>
                                <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                   <a href="/remove_cart/{{$s_cart->id_transaction}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                      </svg>
                                   </a>
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="block relative">
                                            <img src="{{asset('image/product')}}/{{$s_cart->photo}}" alt="" class="mx-auto object-cover rounded-full h-10 w-10">
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitspace-no-wrap">{{$s_cart->item_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if($s_cart->qty >= $limit)
                                <del> harga awal Rp. {{number_format($s_cart->price)}}</del>
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Rp.{{number_format($s_cart->price-($total*$s_cart->price))}}
                                </p>
                                @else
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Rp. {{number_format($s_cart->price)}}
                                </p>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$s_cart->qty}}
                                </p>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="px-11">
            <form method="POST" action="{{route('proses_pembayaran')}}">
                @csrf
                        <input type="hidden" name="id_transaction" value="{{$s_cart->id_transaction}}">
                        <input type="hidden" name="id_transaction_status" value="{{$s_cart->id_transaction_status}}">
                        <input type="hidden" name="id_item" id="" value="{{$s_cart->id_item}}">
                        <input type="hidden" name="qty" value="{{$s_cart->qty}}">
                <div class="flex w-full flex-col lg:flex-row">
                    <div class="grid grid-cols-1 lg:grid-cols-2 w-full gap-5">
                        <div class="grid grid-col">
                                <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Provinsi</p>
                                <div class="flex w-full mx-auto px-2 block">
                                    <input class="px-2 py-3 
                                    w-full 
                                    overflow-hidden border rounded-lg dark:border-gray-600 "
                                    type="text" name="provinsi" placeholder="Provinsi" aria-label="">
                                </div>
                        </div>

                        <div class="grid grid-col">
                            <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">kota</p>
                            <div class="flex w-full mx-auto px-2  block">
                                <input class="px-2 py-3 
                                w-full 
                                overflow-hidden border rounded-lg dark:border-gray-600 "
                                type="text" name="kota" placeholder="Kota / Kabupaten" aria-label="">
                            </div>
                        </div>

                        <div class="grid grid-col">
                            <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">kecamatan</p>
                            <div class="flex w-full mx-auto px-2  block">
                                <input class="px-2 py-3 
                                w-full 
                                overflow-hidden border rounded-lg dark:border-gray-600 "
                                type="text" name="kecamatan" placeholder="Kecamatan" aria-label="">
                            </div>
                        </div>

                        <div class="grid grid-col">
                            <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Kelurahan</p>
                            <div class="flex w-full mx-auto px-2  block">
                                <input class="px-2 py-3 
                                w-full
                            
                                overflow-hidden border rounded-lg dark:border-gray-600 "
                                type="text" name="kelurahan" placeholder="Kelurahan" aria-label="">
                            </div>
                        </div>
                        <div class="grid grid-col col-span-2">
                            <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">No telephone / Whatsapp</p>
                            <div class="flex w-full mx-auto px-2 py-2  block">
                                <input class=" px-2 py-2 
                                w-full
                                overflow-hidden border rounded-lg dark:border-gray-600"
                                type="text" name="phone_number" 
                                placeholder="No telephone / Whatsapp" 
                                value="{{!empty($cek_alamat->phone_number) ? $cek_alamat->phone_number : ''}}"
                                @error('phone_number') is-invalid @enderror>
                            </div>
                            @error('phone_number')
                            <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>          
                            @enderror
                        </div>

                        <div class="grid grid-col col-span-2">
                            <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">alamat lengkap</p>
                            <div class="flex w-full mx-auto px-2 py-2  block">
                                <textarea class=" px-2 py-3 
                                w-full
                                overflow-hidden border rounded-lg dark:border-gray-600"
                                type="text" name="alamat" placeholder="Alamat" aria-label=""  @error('alamat') is-invalid @enderror>
                                {{(!empty($cek_alamat->address_name) ? $cek_alamat->address_name : '')}}
                            </textarea>
                            </div>
                            @error('alamat')
                            <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>          
                            @enderror
                        </div>                   
                    </div>

                    <div class="flex flex-col w-full lg:w-1/2 gap-3">
                        <div class="flex lg:flex-row overflow-x-auto w-full h-fit">
                        <div class="flex-col w-full lg:w-1/2 mb-3 " >
                            
                                <p class="text-lg text-gray-800 py-2 font-roboto text-left font-semibold">Subtotal</p>
                                <p class="text-lg text-gray-800 py-2 font-roboto text-left font-semibold">Shipping Free</p>
                                <p class="text-lg text-bg-tombol py-2 font-roboto text-left font-semibold">Total</p>
                            </div>
                            <div class="flex flex-col w-full lg:w-1/2 h-fit mb-3 ">
                                @if($s_cart->qty >= $limit)
                                    <p class="text-lg text-gray-800 py-2 font-roboto text-center font-semibold">Rp {{number_format($s_cart->price-($total*$s_cart->price))}}</p>
                                @else
                                    <p class="text-lg text-gray-800 py-2 font-roboto text-center font-semibold">Rp {{number_format($s_cart->price)}}</p>

                                @endif
                                <p class="text-lg text-gray-800 py-2 font-roboto text-center font-semibold">0</p>
                                <p class="text-lg text-bg-tombol py-2 font-roboto text-center font-semibold">Rp.{{number_format($s_cart->total_price)}}</p>
                            
                            </div>
                            
                        </div>
                        <div class="flex flex-col w-full">
                        

                            <button class="mx-auto text-white 
                                bg-bg-tombol text-sm capitalize
                                py-2 px-11 font-Roboto justify-center">
                                check out
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
@endsection
@push('js')
    
@endpush