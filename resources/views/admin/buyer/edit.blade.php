@extends('layouts.backend.app')
@section('title','Kategori')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="{{route('admin.show_buyer_diskon')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Data Diskon</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.update_buyer_diskon',$e_buyer_diskon->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Nama <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="buyer" 
                                value="{{$e_buyer_diskon->buyer}}"
                                class="form-control" @error('buyer') is-invalid @enderror> 
                                @error('buyer')
                                    <span class="label label-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>                 
                                @enderror
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Minimal Stok <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="number" 
                                name="stock_limit" 
                                value="{{$e_buyer_diskon->stock_limit}}"
                                class="form-control" @error('stock_limit') is-invalid @enderror> 
                                @error('stock_limit')
                                    <span class="label label-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>                 
                                @enderror
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Diskon<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <label for="" class="text-danger">Gunakan Angka Desimal</label>
                                <input type="text" 
                                name="discount_percentage" 
                                value="{{$e_buyer_diskon->discount_percentage}}"
                                class="form-control" @error('discount_percentage') is-invalid @enderror> 
                                @error('discount_percentage')
                                    <span class="label label-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>                 
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-md btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-md btn-warning" type="reset">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection



@push('js')
   
@endpush