@extends('layouts.backend.app')
@section('title','Tambah Blog')

@push('css')
        {{-- <link href={{ asset('assets/css/plugins/summernote/summernote.css')}} rel="stylesheet">
        <link href={{ asset('assets/css/plugins/summernote/summernote-bs3.css')}} rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="{{route('admin.show_admin_blog')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Artikel</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_admin_blog')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" 
                            class="col-lg-2 control-label">{{ __('Judul') }}</label>

                            <div class="col-lg-10">
                                <input id="title" 
                                type="text" class="form-control 
                                @error('title') is-invalid @enderror" 
                                name="title" value="{{ old('title') }}" required 
                                autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Thumbnail</label>
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
                            <div class="col-lg-12 ">
                                <textarea name="body" 
                                class="summernote" class="form-control" 
                                ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-5 col-lg-10">
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote()
});
</script>
@endpush