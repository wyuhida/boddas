@extends('layouts.backend.app')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in! as ')  }}
                        {{ Auth::user()->fullname }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="wrapper wrapper-content">
        <div class="row">

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Total Penjualan</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$total_penjualan}}</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total</small>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Reseler</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$total_reseler}}</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        
                        <h5>Afiliate</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$total_afiliate}}</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Customer</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$total_customer}}</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Total</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">Monthly</span>
                        <h5>Omzet Seluruh Penjualan</h5>
                    </div>
                    <div class="ibox-content">
                        @foreach($omzet as $omz)
                        <h1 class="no-margins">{{number_format($omz->total, 0,',','.')}}</h1>
                        @endforeach
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                        <small>Omzet Penjualan</small>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Produk Favorit</h5>
                        <div class="pull-right">
                            <div class="btn-group">
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped table-responsive">
                                   <thead>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Jumlah Penjualan</th>
                                   </thead>
                                   @foreach($p_favorite->groupBy('id_item') as $fav)
                                   <tbody>
                                      @foreach ($fav as $key => $item)
                                      
                                      <tr>
                                            @if($item[0]->total_sold == 0)
                                                <td colspan="3" class="text-center">
                                                    <strong>Tidak Ada Data</strong>
                                                </td>
                                            @else
                                                <td>{{$key + 1}}</td>
                                                <td>
                                                    <img class="tampilan_cover" 
                                                        src="{{ asset('image/product')}}/{{$item[0]->photo}}" alt="" srcset="" width="64px;" height="70px;">
                                                </td>
                                                <td>{{$item[0]->total_sold}}</td>
                                            @endif
                                        </tr>
                                       

                                      @endforeach
                                   </tbody>
                                   @endforeach
                                </table>
                            </div>
                        </div>
    
                </div>
            </div>
        </div>
    </div>

@endsection
