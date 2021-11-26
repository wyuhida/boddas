@extends('layouts.backend.app')
@section('title','Admin Users')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="{{route('superadmin.show_user_admin')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Data Admin</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('superadmin.update_user_admin',$edit_admin->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                  

                        {{-- <p>Isi Form.</p> --}}
                        {{-- <div class="form-group">
                            <label class="col-lg-2 control-label">
                                fullname <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                placeholder="item_name"
                                name="item_name" 
                                class="form-control" required>
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="name" 
                            class="col-lg-2 control-label">{{ __('Nama Lengkap') }}</label>

                            <div class="col-lg-10">
                                <input id="fullname" 
                                type="text" class="form-control 
                                @error('fullname') is-invalid @enderror" 
                                name="fullname" value={{$edit_admin->fullname }} required 
                                autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-lg-10">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value={{$edit_admin->email }} required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-lg-2 control-label">{{ __('Nomor Telepon') }}</label>

                            <div class="col-lg-10">
                                <input id="phone_number" 
                                type="number" 
                                class="form-control @error('phone_number') is-invalid @enderror"
                                 name="phone_number" value={{$edit_admin->phone_number }} required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="col-lg-2 control-label"></label>

                            <div class="col-lg-10">
                                <img class="tampilan_cover" 
                                    src="{{ asset('image/profile')}}/{{$edit_admin->foto}}" alt="default.png" srcset="" width="50px;" height="70px;">
                            </div>
                        </div>

                        
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
                                    <input type="file" name="photo"></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-lg-2 control-label">{{ __('Status') }}</label>

                            <div class="col-lg-10">
                                <div class="i-checks">
                                    <label> <input type="checkbox" value="1" name="status" value="1" {{ $edit_admin->is_active == true ? 'checked' : ''}}> <i></i> 
                                        Aktif </label></div>
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