@extends('layouts.backend.app')

@section('title','Settings')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

<style>
    form i {
    margin-left: -30px;
    cursor: pointer;
}
</style>
@endpush

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                  {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
                 
                  <a type="button" href="#" 
                  class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                  <h2>Data Diri</h2>
                 
                    <div class="ibox-content">
                        <form class="form-horizontal" action="{{ route('admin.admin.profil.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <p>Isi Form.</p> --}}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Fullname
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" 
                                    name="fullname" 
                                    value="{{Auth::user()->fullname}}"
                                    class="form-control @error('fullname') is-invalid @enderror"> 
                                        @error('fullname')
                                            <span class="help-block m-b-none" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>                 
                                        @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Username
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" 
                                    value="{{Auth::user()->username}}"
                                    name="username" 
                                    class="form-control  @error('username') is-invalid @enderror"> 
                                    @error('username')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" 
                                    value="{{Auth::user()->email}}"
                                    name="email" 
                                    class="form-control @error('email') is-invalid @enderror"> 
                                    @error('email')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nomor Telephone</label>
                                <div class="col-lg-10">
                                    <input type="number" 
                                    value="{{Auth::user()->phone_number}}"
                                    name="phone_number" 
                                    class="form-control @error('phone_number') is-invalid @enderror"> 
                                    @error('phone_number')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">img</label>
                                <div class="col-lg-10">
                                    <div class="client-avatar">
                                        {{-- {{ URL('/img/banner/'.$banner->img_name)} --}}
                                        <img src="{{ asset('image/profile/'.Auth::user()->foto ) }}" class="img-responsive" alt=""> 
                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Unggah Foto</label>
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
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-md btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                  {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
                 
                  
                  <h2>Ubah Password</h2>
                 
                    <div class="ibox-content">
                        <form class="form-horizontal" action="{{ route('admin.admin.password.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <p>Isi Form.</p> --}}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Paaword Lama
                                </label>
                                <div class="col-lg-10">
                                    <input type="password"
                                    name="old_password" 
                                    class="form-control @error('old_password') is-invalid @enderror">
                                    
                                    
                                        @error('old_password')
                                            <span class="help-block m-b-none" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>                 
                                        @enderror
                                </div>
                            </div>

                           
    
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Pasword Baru
                                </label>
                                <div class="col-lg-10">
                                    <input type="password" 
                                    name="password" 
                                    class="form-control  @error('password_baru') is-invalid @enderror"> 
                                    @error('password_baru')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Konfirmasi Pasword</label>
                                <div class="col-lg-10">
                                    <input type="password" 
                                    
                                    name="password_confirmation" 
                                    class="form-control @error('confirm_password') is-invalid @enderror"> 
                                    @error('confirm_password')
                                        <span class="help-block m-b-none" role="alert">
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

    
</div>    
  
@endsection

@push('js')
    
@endpush