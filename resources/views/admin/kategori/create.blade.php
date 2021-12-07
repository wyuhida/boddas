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
             
              <a type="button" href="{{route('admin.show_admin_kategori')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Data Kategori</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_admin_kategori')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                placeholder="Kategori"
                                name="category_name" 
                                class="form-control" @error('category_name') is-invalid @enderror> 
                                @error('category_name')
                                    <span class="label label-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>                 
                                @enderror
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Aktifkan</label>
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