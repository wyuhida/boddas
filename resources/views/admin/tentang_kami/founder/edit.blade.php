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
             
              <a type="button" href="{{route('admin.admin_tentangkami')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Ubah Founder</h2>
             
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.update_admin_tentangkami',$edit_tentangkami->id_container)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <p>Isi Form.</p> --}}

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
                            <label for="name" 
                            class="col-lg-2 control-label"></label>

                            <div class="col-lg-10">
                                <img src="{{ asset('image/company')}}/{{$edit_tentangkami->image}}" alt="" style="width: 50%; height:200px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Deskripsi
                            </label>
                            <div class="col-lg-offset-2 col-lg-10">
                                <textarea name="content_name" class="summernote" 
                                class="form-control" cols="50" rows="50" style="height: 200px;">
                                    {{$edit_tentangkami->content_name}}
                                </textarea>
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
<script src="https://cdn.ckeditor.com/4.17.1/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content_name' );
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height:400
        })
});
</script> --}}
@endpush