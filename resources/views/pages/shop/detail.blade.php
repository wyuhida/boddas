@extends('layouts.frontend.app')

@section('title','Detail')
    
@push('css')
    <link href={{asset('vendors/smart-form/smart-formsUI.css')}} rel='stylesheet'/>
    <link href={{asset('vendors/css/shop-style.css')}} rel="stylesheet">
@endpush

@section('content')
<?php
    use App\Http\Controllers\ShopController;
    $stock_l = ShopController::total_diskon();
    $limit = $stock_l['stock_limit'];
    $total = $stock_l['discount_percentage'];
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

<div class="container pt90 pb60">
    <div class='row align-items-center'>
        <div class='col-md-7'>
            <div id="js-grid-slider-thumbnail" class="cbp">
                @foreach($detail as $det)
                <div class="cbp-item">
                    <div class="cbp-caption">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{{asset('image/product')}}/{{$det->photo}}" alt="{{$det->item_name}}"
                            style="width:600px; height:400px;" class="img-fluid">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="js-pagination-slider">
                @foreach($detail as $det)
                <div class="cbp-pagination-item cbp-pagination-active">
                    <img src="{{asset('image/product')}}/{{$det->photo}}" alt="">
                   
                </div>
                @endforeach
            </div>
            {{-- <div class="embed-responsive embed-responsive-21by9 mb20">
                @foreach($detail as $det)
                @if($det->video)
               
                    <iframe src="{{asset('video/product')}}/{{$det->video}}" 
                        style="
                        width:100%;height:100%;left:0" 
                        width="641" 
                        height="360" 
                        frameborder="0" allowfullscreen></iframe>
                
              

               @endif
               @endforeach
            </div>    --}}
        </div>

        <div class='col-md-5'>
            <h2>{{$detail[0]->item_name}}</h2>
            <h4>Stok: {{$detail[0]->total_stock}}</h4>
            <div class='clearfix mb30'>
                <span class='float-right'>
                    
                </span>
                <h4 class='text-info'>Rp.{{number_format($detail[0]->price-($total*$detail[0]->price))}}</h4>
            </div>
            <p>
               {!! $detail[0]->detail_product !!}
            </p>
            <form method="post" action="{{route('add_cart')}}"  class="pt20">
                @csrf
                <h4><small>Minimal Pembelian</small></h4>
                <input type="hidden" name="id_item" value={{$detail[0]->id_item}}>
                <input type="hidden" name="diskon" value={{$detail[0]->price-($total*$detail[0]->price)}}>
                <input type="hidden" name="limit" id="" value={{$limit}}>
                <input type="hidden" name="harga_default" value="{{$detail[0]->price}}">
                <div class="quantity">                            
                    <input type="button" class="minus" value="-">
                    @if(!empty(Auth::user()->id))
                       
                        <input type="text" class="input-text qty text" title="Qty" 
                        value={{1}} name="quantity" min="1" step="1">
                        <input type="button" class="plus" value="+">
                    @else
                        <input type="text" class="input-text qty text" title="Qty" 
                        value="1" name="quantity" min="1" step="1">
                        <input type="button" class="plus" value="+">
                    @endif
                </div>
                <button type="submit" class="btn btn-info btn-sm mb5">Beli Sekarang</button>
                    {{-- <a href={{route('show_cart',$detail[0]->id_item)}} class="btn btn-info btn-sm mb5">Beli Sekarang</a> --}}
                </div>
            </form>
           
        </div>
        <div class="embed-responsive embed-responsive-21by9 mb20">
            @if($det->video)
            <iframe src="{{asset('video/product')}}/{{$det->video}}" 
                style="position:absolute;width:100%;height:100%;left:0" 
                width="641" height="360" frameborder="0" allowfullscreen>
            </iframe>
            @endif
        </div>

 
    </div>
</div>
@endsection
@push('js')
     <!-- init cubeportfolio -->
     <script type="text/javascript" src="{{asset('vendors/js/cube-thumb-slider.js')}}"></script>
@endpush