@extends('layouts.frontend.app')
@section('title','Produk')
    
@push('css')
    
@endpush

@section('content')
<?php
    use App\Http\Controllers\ShopController;
    $total = ShopController::total_diskon();
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
    
    <div class="row">
        @foreach($item->groupBy('id_item') as $items)
        {{-- @dd($items); --}}
        @foreach($items as $itm)
        <div class="col-md-6 col-lg-3 mb40">
            <a href={{route('detail_shop',$itm[0]->id_item)}} class="simple-hover">
                <img src="{{asset('image/product')}}/{{$itm[0]->photo}}" alt="" class="img-fluid">
            </a>
            <div class="clearfix product-meta">

                <p class="lead mb0"><a href={{route('detail_shop',$itm[0]->id_item)}}>{{$itm[0]->item_name}}</a></p>
                @if(!empty(Auth::user()->id))
                <h4 class="">Rp.{{number_format($itm[0]->price-($total*$itm[0]->price))}}</h4>
                @else
                <h4 class="">Rp.{{$itm[0]->price}}</h4>
                @endif
            </div>
       
        </div><!--/col-->
        @endforeach
        @endforeach
    </div>
    <nav aria-label="Page navigation example" class="mb20">
                <ul class="pagination pagination justify-content-end">
                    <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
</div>
@endsection
@push('js')
    
@endpush