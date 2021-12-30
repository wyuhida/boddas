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
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" 
                                src="{{asset('image/profile')}}/{{$profile->foto}}">
                        </div>
                        <div class="ibox-content profile-content">
                            <form action="{{route('buyer.update_image_profile',$profile->id_user)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label title="Upload image file" for="inputImage" class="btn btn-sm btn-white">
                                                <input type="file" accept="image/*" name="foto" id="inputImage" class="hide">
                                                Pilih Foto
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <button 
                                            id="unggah"
                                            style="display: none;"
                                            type="submit"  class="btn btn-primary btn-sm btn-block"><i class="fa fa-upload"></i>Unggah</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox-title">
                <h5>Ubah Biodata Diri</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal" action="{{route('buyer.update_profile',$profile->id_user)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><label class="col-lg-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" name="fullname" placeholder="Nama" 
                            class="form-control @error('old_password') is-invalid @enderror" value="{{$profile->fullname}}">
                            @error('fullname')
                            <span class="help-block m-b-none" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>                 
                        @enderror 
                            {{-- <span class="help-block m-b-none">Example block-level help text here.</span> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No HP</label>
                        <div class="col-lg-10">
                            <input type="text" name="phone_number" 
                            placeholder="No Handphone" class="form-control 
                            @error('old_password') is-invalid @enderror" value="{{$profile->phone_number}}"> 
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
                            <input type="email" name="email" placeholder="Email" class="form-control @error('old_password') is-invalid @enderror" value="{{$profile->email}}"> 
                            @error('email')
                                <span class="help-block m-b-none" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>                 
                            @enderror    
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <textarea name="address_name" placeholder="alamat" class="form-control  @error('old_password') is-invalid @enderror">{{$profile->address_name}}</textarea> 
                            @error('email')
                                <span class="help-block m-b-none" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>                 
                            @enderror    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
               
            </div>

            <div class="ibox-title">
                <h5>Ubah Katasandi</h5>
            </div>
            <div class="ibox-content">
                <form action="{{route('buyer.update_katasandi')}}" class="form-horizontal" method="POST">
                    @csrf
                    @method('PUT')
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
                            <button class="btn btn-sm btn-info" type="submit">Simpan</button>
                        </div>
                    </div>

                </form>
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