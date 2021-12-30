@extends('layouts.frontend.app')

@section('content')
{{-- <div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Omzet Seluruh penjualan</h5>
            </div>
            <div class="ibox-content">
                    <h1 class="no-margins">10.000</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Omzet Penjualan</small>
            </div>
        </div>
       
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
      
        <div class="ibox">
            <div class="ibox-title">
                <span class="pull-right">(<strong>{{$newItem->count()}}</strong>) items</span>
                <h5>Semua Transaksi</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  
                    <table class="table shoping-cart-table">
                        @if($newItem->count() == null)
                        
                           <tbody>
                               <td>tidak ada data</td>
                           </tbody>
                        
                        @endif

                        @foreach($newItem->groupBy('id_transaction') as $itm)
                        @foreach($itm as $item)
                        <tbody>
                        <tr>
                            <td width="90" height="90">
                                    <img width="90"
                                    src="{{asset('image/product')}}/{{$item[0]->photo}}" alt="" srcset="">
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="#" class="text-navy">
                                   {{$item[0]->item_name}}
                                </a>
                                @if($item[0]->id_transaction_status == 2 )
                                    <p class="label label-warning">
                                            status: {{$item[0]->status_name}}
                                    </p>
                                @endif
                                @if($item[0]->id_transaction_status == 1 )
                                    <p class="label label-info">
                                            status: {{$item[0]->status_name}}
                                    </p>
                                @endif
                                @if($item[0]->id_transaction_status == 3 )
                                <p class="label label-danger">
                                        status: {{$item[0]->status_name}}
                                </p>
                                @endif
                                </h3>
                                
                                <p class="medium">
                                    tanggal transaksi :
                                    {{\Carbon\Carbon::parse($item[0]->created_at)->translatedFormat('l, d F Y - h:i:s')}}
                                </p>
                              

                                <div class="m-t-sm">
                                   @if($item[0]->id_transaction_status == 2)
                                    <form action="{{route('buyer.update_pembayaran',$item[0]->id_transaction)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label title="Upload image file" for="inputImage" class="btn btn-sm btn-default">
                                            <input type="file" accept="image/*" name="foto" id="inputImage" class="hide">
                                            Unggah Bukti Pembayaran
                                        </label>
                                        <button 
                                        id="unggah"
                                        style="display: none;"
                                        type="submit" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i>upload</button>
                                    </form>
                                   @endif
                                </div>
                            </td>

                           
                            <td>
                                <h4>
                                   Rp. {{number_format($item[0]->total_price)}}
                                </h4>
                            </td>

                            <td width="65">
                                <input type="text" class="form-control" value="{{$item[0]->qty}}" disabled>
                            </td>

                           
                        </tr>
                        </tbody>
                        @endforeach
                        @endforeach
                        
                    </table>
                    {{$newItem->render('customPagination')}}
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="
        flex flex-col
        w-full
        mx-auto
        px-10
        md:flex-row
        gap-5
        mx-auto
        ">
        <form action="{{route('buyer.update_image_profile',$profile->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="
                flex flex-col
                border border-gray-300
                items-center
                shadow-md
                rounded
                my-10
                gap-5
                md:w-96
                md:h-fit
                ">
                <img 
                class="
                    object-center
                    items-center
                    w-full
                    h-80
                    md:w-96
                    "
                src="{{asset('image/profile')}}/{{$profile->foto}}" alt="" srcset="">
                <div class="
                    flex flex-col 
                    my-5
                    overflow-hidden 
                    relative
                    "
                    >
                    {{-- <label class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-auto" 
                        for="user_avatar">Unggah Foto</label> --}}
                        <button class="
                            bg-blue-500 
                            over:bg-blue-light text-white font-bold
                            py-2 px-4
                            w-full
                            inline-flex
                            w-full
                            ">
                            <span class="ml-2" name="upload">Pilih Foto</span>
                            <input
                            class="cursor-pointer absolute block py-2 px-4 w-full opacity-0 pin-r pin-t bg-gray-800"
                            type="file"
                            name="foto"
                            id="inputImage"
                            accept="image/*"
                            >
                        </button>
                        <button class="
                            mt-3
                            bg-blue-500 
                            over:bg-blue-light text-white font-bold
                            py-2 px-4
                            w-full
                            inline-flex
                            justify-center
                            w-full"   
                            id="unggah"
                            style="display: none;">
                            <svg fill="#FFF" class="mt-1" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                            </svg>
                            Unggah
                        </button>
                </div>
            </div>
        </form>

        <div class="
            flex flex-col
            border border-gray-200
            rounded
            md:w-2/3
            md:my-10
            ">
            <div class="flex flex-row">
                <h1 class="font-Roboto py-2 font-light text-lg px-2 inline-block">Biodata Diri</h1>
                @if($profile->is_active == 1)
                <span class="font-Roboto py-2 font-bold text-lg px-2 inline-block bg-blue-200 ">Aktif</span>
                @else
                <span class="font-Roboto py-2 text-lg px-2 inline-block bg-bg-tombol">Tidak Aktif</span>

                @endif

            </div>
            <hr class="border-px border-gray-100 px-2">
            <form class="form-horizontal" action="{{route('buyer.update_profile',$profile->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Nama</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600 
                        @error('old_password') is-invalid @enderror" value="{{$profile->fullname}}"
                        type="text" name="fullname" placeholder="nama lengkap" aria-label="" >
                       
                    </div>
                    @error('fullname')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>

                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">No hp / Whatsapp</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600
                        @error('phone_number') is-invalid @enderror" value="{{$profile->phone_number}} "
                        type="text" name="phone_number" placeholder="no hp / whtasapp" aria-label="" >
                    </div>
                    @error('phone_number')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>

                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">email</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600 
                        @error('email') is-invalid @enderror" value="{{$profile->email}}"
                        type="email" name="email" placeholder="email" aria-label="" >
                    </div>
                    @error('email')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>
                
                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">alamat</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <textarea class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600
                        @error('address_name') is-invalid @enderror"
                        type="text" name="address_name" placeholder="Alamat Lengkap" aria-label="" >
                        {{$profile->address_name}}
                    </textarea>
                    </div>
                    @error('address_name')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 

                </div>

                <div class="flex flex-col w-full mb-5">
                    <button
                    type="submit"
                    class="
                    mt-5
                        mx-auto text-white 
                        bg-bg-tombol text-sm capitalize
                        py-2 px-11 font-Roboto justify-center">
                        Simpan
                    </button>                           
                </div>
            </form>
            

            <h1 class="font-Roboto py-2 font-light text-lg px-2">Ubah Kata Sandi</h1>
            <hr class="border-px border-gray-100 px-2">
            <form action="{{route('buyer.update_katasandi')}}" class="form-horizontal" method="POST">
                @csrf
                @method('PUT')
                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Password Lama</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600
                        @error('old_password') is-invalid @enderror"
                        type="password" name="old_password" placeholder="Password Lama" aria-label="" >
                    </div>
                    @error('old_password')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>

                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Password Baru</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600
                        @error('password_baru') is-invalid @enderror"
                        type="password" name="password" placeholder="password" aria-label="" >
                    </div>
                    @error('password_baru')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>

                <div class="flex-col w-full">
                    <p class="px-3 text-lg font-Roboto text-bg-tombol font-semibold capitalize">Konfirmasi Password</p>
                    <div class="flex w-full mx-auto px-2 block">
                        <input class="px-2 py-3 
                        w-full 
                        overflow-hidden border rounded-lg dark:border-gray-600 
                        @error('confirm_password') is-invalid @enderror"
                        type="password" name="password_confirmation" placeholder="Konfirmasi Password" aria-label="" >
                    </div>
                    @error('confirm_password')
                    <div class="p-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>              
                    @enderror 
                </div>

                <div class="flex flex-col w-full mb-5">
                    <button
                    type="submit"
                    class="
                    mt-5
                        mx-auto text-white 
                        bg-bg-tombol text-sm capitalize
                        py-2 px-11 font-Roboto justify-center">
                        Simpan
                    </button>                           
                </div>
            </form>

        </div>
    </div>
   @if($profile->id_buyer != 1 | null)
        <div class="container mx-auto px-10 w-full bg-white">
            <div class="py-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Produk</th>
                                    <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Tanggal</th>
    
                                    <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Jumlah</th>
                                    <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Status</th>
                                    <th scope="col" class="px-5 py-3 bg-white border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-normal">Total</th>
                                </tr>
                            </thead>
                            @if($newItem->count() == null)
                            
                                <tbody>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-full">
                                        Tidak Ada Data
                                    </td>
                                </tbody>
                        
                            @endif
                            @foreach($newItem->groupBy('id_transaction') as $itm)
                            @foreach($itm as $key=> $item)
                            <tbody>
                               
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#" class="block relative">
                                                <img src="{{asset('image/product')}}/{{$item[0]->photo}}" alt="" class="mx-auto object-cover rounded-full h-10 w-10">
                                            </a>
                                        </div>
                                        <div class="ml-3 mr-3">
                                            <p class="text-gray-900 whitspace-no-wrap"> {{$item[0]->item_name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{\Carbon\Carbon::parse($item[0]->created_at)->translatedFormat('l, d F Y - h:i:s')}}
                                </td>
                                
                            
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$item[0]->qty}}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$item[0]->status_name}}
                                        </p>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Rp. {{number_format($item[0]->total_price)}}
                                        </p>
                                    </p>
                                </td>
                            </tbody>
                        
                                @endforeach
                            @endforeach
                            <tfoot>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="4">total Omzet</td>
                               @if($tot != null)
                                <td>
                                    Rp. {{number_format($tot->total)}}
                                </td>
                               @else
                                <td></td>
                            @endif
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    @endif

@endsection
@push('js')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> --}}
<script>
    $(document).ready(function(){
        $('#inputImage').change(function(){
            $('#unggah').show();
        });
    });
 </script>

@endpush