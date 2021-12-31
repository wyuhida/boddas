@extends('layouts.backend.app')

@push('css')
    <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <x-embed-styles />
@endpush
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Promosi Pengenalan </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    {{-- <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" placeholder="Cari" class="input-sm form-control"> 
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-primary"> Cari </button> </span></div>
                    </div> --}}
                    <div class="pull-right">
                        <div class="input-group">
                            <a href="{{route('admin.create_promosi_pengenalan')}}" class="btn btn-sm btn-primary"> Tambah </a>
                        </div>
                    </div>
                   
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Gambar </th>
                                <th>Deskripsi </th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($section_p as $key=> $sp)
                        <tbody>
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <img width="64" height="90" src="{{asset('image/promosi')}}/{{$sp->image}}" alt="">
                                </td>
                                <td>
                                    {{ 
                                        Str::limit(strip_tags(htmlspecialchars_decode($sp->content_name))) 
                                      }}
                                </td>
                                <td>
                                    @if($sp->id_content_status == 1)
                                      <span class="label label-info">Aktif</span>
                                    @else
                                      <span class="label label-danger">Tidak Aktif</span>
                                      @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                      <button data-toggle="dropdown" 
                                          class="btn dropdown-toggle">
                                          
                                          Atur 
                                          <span class="caret">
                                             
                                          </span>
                                        
                                      </button>
                                      <ul class="dropdown-menu text-center" >
                                          <li>
                                              <a href="{{route('admin.edit_promosi_pengenalan',$sp->id_container)}}"
                                                  class="btn btn-xs">
                                                  <i class="fa fa-edit"></i>
                                                  Edit</a>
                                          </li>
                                          <li class="divider"></li>
                                          <li>
  
                                              <a class="btn btn-xs"
                                                  onclick="deleteSpp({{ $sp->id_container }})" >
                                                  <i class="fa fa-trash"></i>
                                                  Hapus
                                              </a>
                                              <form id="delete-form-{{ $sp->id_container }}" 
                                                  action="{{route('admin.delete_promosi_pengenalan',$sp->id_container)}}" 
                                                  method="POST" style="display: none;">
                                                  @csrf
                                                  @method('DELETE')
                                              </form>
                                          </li>
                                      </ul>
                                  </div>
                                </td>             
                                
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Testimoni</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <div class="table-responsive">
                        <div class="pull-right">
                            <div class="input-group">
                                <a href="{{route('admin.create_testimoni')}}" class="btn btn-sm btn-primary"> Tambah </a>
                            </div>
                        </div>
                        <table class="table table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            
                            @foreach($section_t as $key => $st)
                            <tbody>
                                <tr class="">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{asset('image/testimoni')}}/{{$st->image}}" width="64" height="90" alt="">
                                    </td>
                                    <td>
                                        @if($st->id_content_status == 1)
                                    <span class="label label-info">Aktif</span>
                                    @else
                                        <span class="label label-danger">Tidak Aktif</span>
                                    @endif
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                          <button data-toggle="dropdown" 
                                              class="btn dropdown-toggle">
                                              
                                              Atur 
                                              <span class="caret">
                                                 
                                              </span>
                                            
                                          </button>
                                          <ul class="dropdown-menu text-center" >
                                              <li>
                                                  <a href="{{route('admin.edit_testimoni',$st->id_container)}}"
                                                      class="btn btn-xs">
                                                      <i class="fa fa-edit"></i>
                                                      Edit</a>
                                              </li>
                                              <li class="divider"></li>
                                              <li>
      
                                                  <a class="btn btn-xs"
                                                      onclick="deletest({{$st->id_container }})" >
                                                      <i class="fa fa-trash"></i>
                                                      Hapus
                                                  </a>
                                                  <form id="delete-form-{{ $st->id_container }}" 
                                                      action="{{route('admin.delete_testimoni',$st->id_container)}}" 
                                                      method="POST" style="display: none;">
                                                      @csrf
                                                      @method('DELETE')
                                                  </form>
                                              </li>
                                          </ul>
                                      </div>
                                    </td>     
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="text-center">
                            {{$section_t->render('customPagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- video -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Video</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
               <div class="ibox-content">
                    
                    <div class="table-responsive">
                        <div class="pull-right">
                            <div class="input-group">
                                <a class="btn btn-sm btn-primary" 
                                data-toggle="modal" data-target="#myModal"> Tambah </a>
                            </div>
                        </div>
                        <table class="table table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                         @foreach($section_v as $key => $sv)
                            <tbody>
                                <tr class="">
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{-- <x-embed url="{{$sv->link_url}}"/> --}}
                                            <iframe 
                                           width="200px" height="200px"
                                            src="{{$sv->link_url}}"
                                            allow="accelerometer; autoplay; 
                                              clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowFullScreen
                                            frameborder="0">
                                          </iframe>
                                       
                                    </td>
                                    <td>
                                        @if($sv->id_content_status == 1)
                                            <span class="label label-info">Aktif</span>
                                        @else
                                            <span class="label label-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                          <button data-toggle="dropdown" 
                                              class="btn dropdown-toggle">
                                              
                                              Atur 
                                              <span class="caret">
                                                 
                                              </span>
                                            
                                          </button>
                                          <ul class="dropdown-menu text-center" >
                                              <li>
                                                <a
                                                      class="btn btn-xs"
                                                      data-toggle="modal" data-target="#myModal6{{ $sv->id_container}}">
                                                      <i class="fa fa-edit"></i>
                                                      Edit
                                                </a>
                                              </li>
                                              <li class="divider"></li>
                                              <li>
      
                                                <a class="btn btn-xs"
                                                    onclick="deletesv({{$sv->id_container }})" >
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
                                                </a>
                                                <form id="delete-form-{{$sv->id_container }}" 
                                                    action="{{route('admin.delete_video', $sv->id_container)}}" 
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                          </ul>
                                      </div>
                                    </td>     
                                </tr>
                            </tbody>
                          @endforeach
                        </table>
                       
                        <div class="text-center">
                            {{$section_v->render('customPagination')}}
                        </div>
                        <!-- input video -->
                        <form action="{{route('admin.store_video')}}" method="POST">
                            @csrf
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">\
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Unggah Video</h4>
                                            <small class="font-bold">Video akan ditampilkan di halaman beranda</small>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Masukan URL</label> 
                                                <input type="text" 
                                                name="link_url"
                                                placeholder="https://www.youtube.com/5Vuxns6RILk" 
                                                class="form-control @error('link_url') is-invalid @enderror ">
                                            </div>
                                            @error('link_url')
                                                <span class="label label-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>                 
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        <!-- update video -->

                        <!-- update video -->
                        @foreach($section_v as $key => $sv)
                            <div class="modal inmodal" id="myModal6{{$sv->id_container}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <form action="{{route('admin.update_video', $sv->id_container)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">\
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Ubah Video</h4>
                                            <small class="font-bold">Video akan ditampilkan di halaman beranda</small>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Masukan URL</label> 
                                                <input type="text" 
                                                name="link_url"
                                                placeholder="https://www.youtube.com/5Vuxns6RILk" 
                                                value="{{$sv->link_url}}"
                                                class="form-control @error('link_url') is-invalid @enderror ">
                                            </div>
                                            @error('link_url')
                                                <span class="label label-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>                 
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                         
                            </div>
                            @endforeach
                        <!-- update video -->


                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- video -->


@endsection

@push('js')
{{-- <script src="{{asset('asssets/js/jquery-3.1.1.min.js')}}"></script> --}}
<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

<script>
    function deletest(id_container){
        Swal.fire({
        title: 'Apa anda yakin?',
        text: "Apakah anda yakin ingin menghapus ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batal!',
        reverseButtons: false
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-' + id_container).submit();    
        } else if (
    // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
        ) {
        Swal.fire(
        'Cancelled',
        'Data tidak jadi terhapus :)',
        'error'
        )
        }
        })
    }
  
  </script>
<script>
    function deleteSpp(id_container){
        Swal.fire({
        title: 'Apa anda yakin?',
        text: "Apakah anda yakin ingin menghapus ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batal!',
        reverseButtons: false
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-' + id_container).submit();    
        } else if (
    // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
        ) {
        Swal.fire(
        'Cancelled',
        'Data tidak jadi terhapus :)',
        'error'
        )
        }
        })
    }
  
</script>

<script>
    function deletesv(id_container){
        Swal.fire({
        title: 'Apa anda yakin?',
        text: "Apakah anda yakin ingin menghapus ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batal!',
        reverseButtons: false
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-' + id_container).submit();    
        } else if (
    // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
        ) {
        Swal.fire(
        'Cancelled',
        'Data tidak jadi terhapus :)',
        'error'
        )
        }
        })
    }
  
</script>
@endpush