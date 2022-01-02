@extends('layouts.backend.app')

@section('title','visi dan misi')

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
              <h2>Tambah Visi Dan Misi</h2>
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_admin_visimisi')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Deskripsi
                            </label>
                            <div class="col-lg-offset-2 col-lg-10">
                                <textarea name="content_name" class="summernote" 
                                class="form-control" cols="50" rows="50" style="height: 200px;">
                                </textarea>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Deskripsi
                            </label>
                            <div class="col-lg-offset-2 col-lg-10">
                                <textarea name="content_name" class="editor1" 
                                class="form-control" cols="50" rows="50" style="height: 200px;">
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