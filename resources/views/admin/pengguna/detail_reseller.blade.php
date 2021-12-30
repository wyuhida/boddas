@extends('layouts.backend.app')

@push('css')
    
@endpush
@section('content')
<div class="row">
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        @if($profile_reseller->foto != 'default.png')
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="{{asset('image/profile')}}/{{$profile_reseller->foto}}">
                            </div>  
                        @else
                            <div class="ibox-content no-padding border-left-right">
                                <span><strong>tidak ada foto</strong> </span>
                            </div>  
                        @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox-title">
                <h5>Biodata Diri</h5>
                <p> 
                    @if($profile_reseller->is_active == 1)
                        <span class="label label-info">Aktif</span>
                    @else
                        <span class="label label-danger">Tidak Aktif</span>
                    @endif

                </p>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" action="" method="POST">
                   
                    <div class="form-group"><label class="col-lg-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input disabled type="text" name="fullname" placeholder="Nama" class="form-control" value="{{$profile_reseller->fullname}}">
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No HP</label>
                        <div class="col-lg-10">
                            <input disabled type="text" name="phone_number" placeholder="No Handphone" class="form-control" value="{{$profile_reseller->phone_number}}"> 
                            @error('phone_number')
                                <span class="help-block m-b-none" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>                 
                            @enderror     
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input disabled type="email" name="email" placeholder="Email" class="form-control" value="{{$profile_reseller->email}}"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <textarea disabled name="address_name" placeholder="alamat" class="form-control">{{$profile_reseller->address_name}}</textarea> 
                        </div>
                    </div>
                </form>
               
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Total Seluruh Pembelian</h5>
            </div>
            <div class="ibox-content">
            @if($tot_r != null)
                <h1 class="no-margins text-center"><strong>{{$tot_r->total}}</strong> Barang</h1>
            @else
                <h1 class="no-margins text-center"><strong>0</strong> Barang</h1>
            @endif
                <div class="stat-percent font-bold text-success"></div>
                <small>Total</small>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Omzet</h5>
            </div>
            <div class="ibox-content">
                @if($omzet_reseller != null)
                <h1 class="no-margins text-center">Rp. {{number_format($tot_reseller->omset, 0,',','.')}}</h1>
                @else
                <h1 class="no-margins text-center">0</h1>

                @endif
                <div class="stat-percent font-bold text-success"></div>
                <small>Omzet</small>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
      
        <div class="ibox">
            <div class="ibox-title ">
                @if($tot_r != null)
                <span class="pull-right ">(<strong>{{$tot_r->total}}</strong>) items</span>
                @else
                <span class="pull-right">(<strong>0</strong>) items</span>
                @endif
                <h5>Semua Transaksi</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                  
                    <table class="table shoping-cart-table">
                        @if($newItemReseller->count() == null)
                        
                           <tbody>
                               <td>tidak ada data</td>
                           </tbody>
                        
                        @endif

                        @foreach($newItemReseller->groupBy('id_transaction') as $itm)
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
                                <p class="large">
                                    Jumlah Pembelian : {{$item[0]->qty}}
                                </p>
                                <p class="medium">
                                    tanggal transaksi :
                                    {{\Carbon\Carbon::parse($item[0]->created_at)->translatedFormat('l, d F Y - h:i:s')}}
                                </p>
                             
                            </td>

                            {{-- <td>
                                $180,00
                                <s class="small text-muted">$230,00</s>
                            </td> --}}
                            <td>
                                <h4>
                                   Rp. {{number_format($item[0]->total_price)}}
                                </h4>
                            </td>

                            {{-- <td>
                                <h4>
                                    {{$item[0]->qty}}
                                 </h4>
                            </td> --}}

                           
                        </tr>
                        </tbody>
                        @endforeach
                        @endforeach
                        
                    </table>
                    {{$newItemReseller->render('customPagination')}}
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