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
                    <form class="form-horizontal" action="{{route('superadmin.store_user_admin')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                  

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
                                name="fullname" value="{{ old('fullname') }}" required 
                                autocomplete="fullname" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">{{ __('Username') }}</label>

                            <div class="col-lg-10">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-lg-10">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                 name="phone_number" value="{{ old('email') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            <label for="password" class="col-lg-2 control-label">{{ __('Password') }}</label>

                            <div class="col-lg-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-lg-2 control-label">{{ __('Konfirmasi Password') }}</label>

                            <div class="col-lg-10">
                                <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-lg-2 control-label">{{ __('Status') }}</label>

                            <div class="col-lg-10">
                                <div class="i-checks">
                                    <label> <input type="checkbox" value="1" name="status" value="1"> <i></i> 
                                        Aktifkan </label></div>
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