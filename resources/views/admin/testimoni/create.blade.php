@extends('layouts.backend.app')
@section('title','Kategori')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
    <style>
        .btn-file {
    position: relative;
    overflow: hidden;
}
/* .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
} */

#img-upload{
    width: 425px;
    height: 349px;
}
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">            
              <a type="button" href="{{route('admin.promosi_pengenalan')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Data Pengenalan Promosi</h2>
                
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_testimoni')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tampilan</label>
                            
                            <img id='img-upload'/>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Foto</label>
                            <div class="col-lg-8 fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div>
                                @error('photo')
                                    <span class="label label-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>                 
                                @enderror
                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new btn-file">Unggah Foto</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" accept="image/*" name="photo" id="imgInp"
                                        @error('photo') is-invalid @enderror >
                                </span>
                               
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label>Upload Image</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input type="file" id="imgInp">
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly>
                            </div>
                           
                        </div> --}}
                        

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                <label for="publish">Aktifkan</label>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


  <script>
      $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
  </script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height:400,
           
            fontSizeUnits: ['px', 'pt']          
        });
});
</script>
@endpush