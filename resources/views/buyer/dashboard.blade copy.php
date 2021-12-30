@extends('layouts.backend.app')

@section('content')
<div class="row">
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
</div>


@endsection
@push('js')
    <script>
       $(document).ready(function(){
           $('#inputImage').change(function(){
               $('#unggah').show();
           });
       });
    </script>
@endpush