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

    <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" 
    data-jarallax='{"speed": 0.2}' 
    style='background-image: url({{asset("vendors/images/bg14.jpg")}})'>
        <div class="container">
            <div class="row">
                <div class=" col-md-8 ml-auto mr-auto">
                    <h1 class='text-uppercase'>Produk</h1>

                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container pb60">
        <h4 class="font300 mb30">
            <a href="#" class="btn btn-dark float-right">Batal</a>

        </h4>
        <table class="table table-condensed table-responsive cart-table mb40">
            <thead>
                <tr>
                    <th></th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="product-image">
                        <img src="{{asset('image/product')}}/{{$s_cart->photo}}" alt="" width="50">
                    </td>
                    <td class="product-name">{{$s_cart->item_name}}</td>
                    @if($s_cart->qty >= $limit)
                
                    <td class="product-price">
                        <del> harga awal Rp. {{number_format($s_cart->price)}}</del><br>
                        Rp.{{number_format($s_cart->price-($total*$s_cart->price))}}</td>
                    @else
                        <td class="product-price">Rp.{{number_format($s_cart->price)}}</td>
                    @endif
                    <td class="product-quantity">{{$s_cart->qty}}</td>
                    @if($s_cart->id_transaction_status == 1)
                    <td>
                        <span class="text-danger">Menunggu Pembayaran</span>
                    </td>
                    @else
                    <td>
                        <span class="label label-danger">Menunggu Konfirmasi</span>
                    </td>

                    @endif
                    <td class="product-total">
                        Rp.{{number_format($s_cart->total_price)}}
                    </td>
                </tr>
               
            </tbody>
        </table>
        <hr class="mb40">
        {{-- <div class="row">
            <div class="col-sm-6">
    
            </div>
            <div class="col-sm-6 text-right">
                <div class="pb20">
                    <h3><small>Your Cart Total - </small> $249</h3>
                </div>
                <a href="#" class="btn btn-primary">Checkout</a>
            </div>
        </div> --}}
    </div>
   


    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="mb40">
                {{-- <h4>Billing Details</h4> --}}
                {{-- <p>Already a customer? <a href="page-login.html" class="btn btn-sm btn-outline-secondary">Login</a></p> --}}
            </div>
            <div class='checkout-smart-form mb50'>
                <div class="smart-forms smart-container wrap-1">
                    <form method="post" action="{{route('proses_pembayaran')}}" id="account2" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_transaction" value="{{$s_cart->id_transaction}}">
                        <input type="hidden" name="id_transaction_status" value="{{$s_cart->id_transaction_status}}">
                        <input type="hidden" name="id_item" id="" value="{{$s_cart->id_item}}">
                        <input type="hidden" name="qty" value="{{$s_cart->qty}}">
                        <div class="form-body">
        
                    <div class="spacer-b30">
                        <div class="tagline"><span>Alamat Pengiriman </span></div><!-- .tagline -->
                    </div> 
            
                    <div class="section">
                        <label class="field prepend-icon">
                            <input type="text" name="provinsi" id="provinsi" 
                            class="gui-input" placeholder="Provinsi">
                            <span class="field-icon">
                                {{-- <i class="fa fa-user"></i> --}}
                            </span>  
                        </label>
                    </div><!-- end section -->
            
                    <div class="section">
                        <label class="field prepend-icon">
                            <input type="text" name="Kota" id="kota" 
                            class="gui-input" placeholder="Kota">
                            <span class="field-icon">
                                {{-- <i class="fa fa-user"></i> --}}
                            </span>  
                        </label>
                    </div><!-- end section -->                                   
                
                    <div class="section">
                        <label class="field prepend-icon">
                            <input type="text" name="kecamatan" id="kecamatan" 
                            class="gui-input" placeholder="Kecamatan">
                            <span class="field-icon">
                                {{-- <i class="fa fa-envelope"> --}}
                                    </i></span>  
                        </label>
                    </div><!-- end section -->
                    
                    <div class="section">
                        <label for="mobile" class="field prepend-icon">
                            <input type="text" name="kelurahan" id="kelurahan"
                        
                             class="gui-input" placeholder="Kelurahan">
                            <span class="field-icon">
                                {{-- <i class="fa fa-phone-square"></i> --}}
                            </span>  
                        </label>
                    </div><!-- end section -->
                    <div class="section">
                        <label for="mobile" class="field prepend-icon">
                            <textarea type="text" name="alamat" id="alamat" 
                            placeholder="Alamat"
                             class="gui-input"
                             style="height: 100px;">
                               
                            </textarea>
                            <span class="field-icon">
                                {{-- <i class="fa fa-phone-square"></i> --}}
                            </span>  
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="mobile" class="field prepend-icon">
                            <input type="number" name="phone_number" 
                            id="mobile" class="gui-input" 
                            placeholder="Nomor Whatsapp">
                            <span class="field-icon">
                                {{-- <i class="fa fa-phone-square"></i> --}}
                            </span>  
                        </label>
                    </div><!-- end section -->
            
            
                    <div class="spacer-t40 spacer-b30">
                        <div class="tagline"><span> Unggah Bukti Pembayaran </span></div><!-- .tagline -->
                    </div> 
            
                    <div class="section">
                        <p class="large-text">
                           <strong> Unggah bukti pembayaran sekarang atau nanti</strong>
                        </p>
                    </div><!-- end section -->
                    <div class="section">
                        <label for="mobile">
                            <input type="file" name="foto" 
                            class="gui-input">
                          
                        </label>
                    </div><!-- end section -->

                    <div class="spacer-t40 spacer-b30">
                        <div class="tagline"><span> Cara Pembayaran </span></div><!-- .tagline -->
                    </div> 

                    <div class="section">
                        <p class="large-text ">
                           1. pilih produk <br>
                           2. upload bukti transfer 
                        </p>
                    </div><!-- end section -->
            
                </div><!-- end .form-body section -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Proses Sekarang </button>
                </div><!-- end .form-footer section -->
                 </form>
    
        </div><!-- end .smart-forms section -->


             <div></div><!-- end section -->


        </div>
            <div class="card card-body cart-total mb50">
               
                <div class="row">
                    <div class="col-sm-6">
                        <span class="h5">Harga Satuan:</span>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="font700">
                            Rp. {{number_format($s_cart->price)}}
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <span class="h5">Harga Diskon:</span>
                    </div>
                    <div class="col-sm-6 text-right">
                        @if($s_cart->qty >= $limit)
                        <span class="font700">
                            {{number_format($s_cart->price-($total*$s_cart->price))}}
                        </span>
                        @else
                        <span class="font700">0</span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <span class="h5">Jumlah Pembelian:</span>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="font700">{{$s_cart->qty}}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <span class="h5">Total:</span>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="h5 font700">Rp.{{number_format($s_cart->total_price)}}</span>
                    </div>
                </div>
            </div>
            {{-- <div class=" text-right">
                <a href="#" class="btn btn-primary btn-lg">Checkout</a>
            </div> --}}
        </div>
    </div>


@endsection

@push('js')
    
@endpush