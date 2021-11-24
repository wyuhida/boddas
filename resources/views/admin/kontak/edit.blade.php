@extends('layouts.backend.app')

@section('title','Company')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="#" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Update Kontak</h2>
             
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.update_admin_kontak',$edt_adminkontak->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                company name
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="company_name" 
                                value="{{$edt_adminkontak->company_name}}"
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
                                no telp
                            </label>
                            <div class="col-lg-10">
                                <input type="number" 
                                name="no_telp" 
                                value="{{$edt_adminkontak->no_telp}}"
                                class="form-control @error('facebok') is-invalid @enderror"> 
                                    @error('no_telp')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                               email
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="email" 
                                value="{{$edt_adminkontak->email}}"
                                class="form-control @error('email') is-invalid @enderror"> 
                                    @error('email')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                facebook
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="facebook" 
                                value="{{$edt_adminkontak->facebook}}"
                                class="form-control @error('facebok') is-invalid @enderror"> 
                                    @error('facebook')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                instagram
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="instagram" 
                                value="{{$edt_adminkontak->instagram}}"
                                class="form-control @error('instagram') is-invalid @enderror"> 
                                    @error('instagram')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                youtube
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="youtube" 
                                value="{{$edt_adminkontak->youtube}}"
                                class="form-control @error('youtube') is-invalid @enderror"> 
                                    @error('youtube')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <textarea name="desc_company" class="summernote" class="form-control" cols="50" rows="50" style="height: 200px;">{{$edt_adminkontak->desc_company}}</textarea>
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
@endsection



@push('js')
   
@endpush