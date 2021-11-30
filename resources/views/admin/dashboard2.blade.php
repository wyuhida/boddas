@extends('layouts.backend.app')
@push('css')

@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row align-items-center mb-30 pt-30">
            <div class="col-md-12 mr-auto ml-auto">
                <div class="mb-0">
                    {{-- <a href='#' class='float-right btn btn-sm btn-info btn-icon'>
                        <i class="fa fa-cog mr-2"></i>View Settings</a> --}}
                    <h4>Welcome back, {{Auth::user()->fullname }}</h4>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 mb-6 col-md-6 mb-30">
                <div class="list border1 rounded overflow-hidden">
                    <div class="list-item">
                        <div class="list-thumb bg-warning-active text-warning-light avatar rounded-circle avatar60 shadow-sm">
                            <i class="icon-Truck"></i>
                        </div>
                        <div class="list-body text-right">
                            <span class="list-title fs-2x">{{$total_penjualan}}</span>
                            <span class="list-content  fs14">Total Penjualan</span>

                        </div>
                    </div>
                </div>
            </div><!--col-->


            <div class="col-lg-3 mb-6 col-md-6 mb-30">
                <div class="list border1 rounded overflow-hidden">
                    <div class="list-item">
                        <div class="list-thumb bg-primary text-primary-light avatar rounded-circle avatar60 shadow-sm">
                            <i class="icon-Add-Basket"></i>
                        </div>
                        <div class="list-body text-right">
                            <span class="list-title fs-2x">{{$total_reseler}}</span>
                            <span class="list-content fs14">Reseller</span>

                        </div>
                    </div>
                </div>
            </div><!--col-->

        
            <div class="col-lg-3 mb-6 col-md-6 mb-30">
                <div class="list border1 rounded overflow-hidden">
                    <div class="list-item">
                        <div class="list-thumb bg-danger-active text-danger-light avatar rounded-circle avatar60 shadow-sm">
                            <i class="icon-Remove-Basket"></i>
                        </div>
                        <div class="list-body text-right">
                            <span class="list-title fs-2x">{{$total_afiliate}}</span>
                            <span class="list-content  fs14">Total Afiliate</span>

                        </div>
                    </div>
                </div>
            </div><!--col-->

          
        </div>

    </div>
</div>
@endsection
@push('js')

@endpush
