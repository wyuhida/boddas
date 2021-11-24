@extends('layouts.backend.app')
@section('title','Produk')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="{{route('admin.show_admin_produk')}}" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Edit Data Produk</h2>
             
              {{-- <p>
                    List Pendamping
                </p> --}}
                {{-- <br> --}}
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.update_admin_produk',$e_item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- <div class="form-group">
                            <label class="col-lg-2 control-label">Foto</label>
                            <div class="col-lg-10 fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div>

                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Unggah Foto</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="photo[]" multiple required></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Video</label>
                            <div class="col-lg-10 fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                    <span class="fileinput-filename"></span>
                                </div>

                                <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Unggah Video</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="video[]" multiple></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>

                        </div> --}}
                       
                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                value="{{$e_item->item_name}}"
                                name="item_name" 
                                class="form-control" required>
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                               Kategori <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                
                                <select name="id_category_item" id="" class="form-control">
                                    @foreach($e_category as $key => $category)
                                        <option
                                            {{$e_item->id_category_item == $category->id ? 'selected':''}}
                                            value={{$category->id}}>{{$category->category_name}}
                                    </option>
                                    @endforeach
                                </select> 
                             
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                detail_product <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <textarea
                               
                                name="detail_product" 
                                class="form-control" required>{{$e_item->detail_product}}</textarea>
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                price <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="number" 
                                value="{{$e_item->price}}"
                                name="price" 
                                class="form-control" required> 
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Total Stok</label>
                            <div class="col-lg-10">
                                <input type="number" 
                                value="{{$e_item->total_stock}}"
                                name="total_stock" 
                                class="form-control" required> 
                                    <span class="help-block m-b-none"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-md btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-md btn-warning" type="reset">Batal</button>
                            </div>
                        </div>
                    </form>
                        {{-- @endforeach --}}
                        <!-- TABLE -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ibox float-e-margins">
                                    
                                        <div class="ibox-content">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                
                                                    <th>img preview</th>
                                                    <th>Video Preview</th>
                                                    <th>upload image</th>
                                                    <th>upload video</th>
                                                    <th>Aksi</th>
                                             
                                                </tr>
                                                </thead>
                                                @foreach($e_content as $key => $ic)
                                                <form action="{{route('admin.update_admin_img_produk',$ic->id)}}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                <tbody>
                                                    <td>{{$key + 1}}</td>
                                                    <td><img class="tampilan_cover img-responsive" 
                                                        src="{{ asset('image/product')}}/{{$ic->photo}}" alt="" srcset="" width="50px;" height="70px;">
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="file" class="form-control file-input-tbl" name="photo">
                                                    </td>
                                                    <td>
                                                     
                                                        <input type="file" class="form-control file-input-tbl" name="video">
                                                    </td>
                                                    <td>
                                                        <button type="submit"  
                                                            class="btn btn-xs btn-warning updateImg">
                                                            <i class="fa fa-refresh"></i> Ubah & Simpan
                                                    </button> 
                                                      
                                                    </td>
                                                    <tbody class="data-image-video" data-row="0">
                                                </form>
                                                    @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Table -->

                        
                   
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection



@push('js')
<script>
    function updateImg(id){
        Swal.fire({
        title: 'Apa anda yakin?',
        text: "Apakah anda yakin ingin Update ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Tidak, batal!',
        reverseButtons: false
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('update-form-' + id).submit();    
        } else if (
    // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
        ) {
        Swal.fire(
        'Cancelled',
        'Data Tidak Update :)',
        'error'
        )
        }
        })
    }

</script>
@endpush