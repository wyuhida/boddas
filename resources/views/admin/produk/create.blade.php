@extends('layouts.backend.app')
@section('title','Produk')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="{{route('admin.show_admin_produk')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Data Produk</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_admin_produk')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Foto</label>
                            <div class="col-lg-10 fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div>

                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Unggah Foto</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="photo[]" multiple required></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Video</label>
                            <div class="col-lg-10 fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div>

                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Unggah Video</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="video[]" multiple></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>

                        </div>

                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                placeholder="item_name"
                                name="item_name" 
                                class="form-control" required>
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                               Kategori <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <select name="id_category_item" id="" class="form-control">
                                    @foreach ($cat as $c)
                                        <option value="{{$c->id}}">{{$c->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                detail_product <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <textarea
                                placeholder="detail_product"
                                name="detail_product" 
                                class="form-control" required></textarea>
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                price <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="number" 
                                placeholder="price"
                                name="price" 
                                class="form-control" required> 
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Total Stok</label>
                            <div class="col-lg-10">
                                <input type="number" 
                                placeholder="stok"
                                name="total_stock" 
                                class="form-control" required> 
                                    <span class="help-block m-b-none"></span>
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