@extends('layouts.frontend.app')

@section('title','Detail')
    
@push('css')
    <link href={{asset('vendors/smart-form/smart-formsUI.css')}} rel='stylesheet'/>
    <link href={{asset('vendors/css/shop-style.css')}} rel="stylesheet">
@endpush

@section('content')

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
        </div>

        <div class='col-md-5'>
            <h2>{{$detail[0]->item_name}}</h2>
            <div class='clearfix mb30'>
                <span class='float-right'>
                    
                </span>
                <h4 class='text-info'>Rp.{{$detail[0]->price}}</h4>
            </div>
            <p>
               {!! $detail[0]->detail_product !!}
            </p>
            <form method="post" class="pt20">
                <h4><small>Quantity</small></h4>
                <div class="quantity">                            
                    <input type="button" class="minus" value="-">
                    <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                    <input type="button" class="plus" value="+">
                </div>
                <button type="button" class="btn btn-primary btn-icon">Add to cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
     <!-- init cubeportfolio -->
     <script type="text/javascript" src="{{asset('vendors/js/cube-thumb-slider.js')}}"></script>
@endpush