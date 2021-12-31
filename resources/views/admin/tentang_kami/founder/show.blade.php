@extends('layouts.backend.app')

@section('title','Company')
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  
<style>
    form i {
    margin-left: -30px;
    cursor: pointer;

      .ibox{
        margin-bottom: 10px;
      }
      .ibox-tools a{
        color : #fff;
      }
      .custom{
      color: white;
    }

}
</style>
@endpush

@section('content')
    <!--- DB TENTANG HEADLINE --> 
    <div class="wrapper wrapper-content animated fadeInRight">
     

        {{-- @foreach($cms_tentang_headline as $key => $cth) --}}
        <!-- table-->
        <div class="row">
          <div class="col-sm-12">
              <div class="ibox">
                <div class="ibox-title">
                  <h2>Founder List</h2>  
                </div>
                  <div class="ibox-content">
                      
                              
                      <br />
                      <div class="ibox-tools ibox float-e-margins">
                          {{-- <a type="button" class="btn btn-xs btn-info text-white-abs"><i class="fa fa-plus" href="{{ route('tambahdata_banner_beranda') }}"></i> Tambah</a>&nbsp; --}}
                          <a type="button" href="{{route('admin.add_admin_tentangkami')}}" class="btn btn-xs btn-info text-white" style="color: white;">
                            <i class="fa fa-plus"></i> Tambah</a>&nbsp;
                      </div>

                      {{-- <form action="" method="GET">
                          <div class="input-group">
                                  <input type="text" placeholder="Search" class="input form-control" 
                                  name="search" value="{{ request()->query('search')}}">
                                  <span class="input-group-btn">
                                      <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                  </span>
                          </div>
                      </form> --}}

                      <div class="clients-list">
                        <table class="table table-striped table-hover dataTables-example">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Gambar</th>
                              <th>Content</th>
                              <th>Status Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          @foreach ($item as $key=> $items)
                          <tbody>
                            
                                <td>{{ $key + 1}}</td>
                                <td>
                                  <img src={{URL::asset("image/company/{$items->image}")}} width="64" height="90" alt="" srcset="">
                                </td>
                                <td> {{ 
                                  Str::limit(strip_tags(htmlspecialchars_decode($items->content_name))) 
                                }}</td>
                                <td>
                                    @if($items->status_name == 1)
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
                                            <a href="{{route('admin.admin_edit_tentangkami',$items->id_container)}}"
                                                class="btn btn-xs">
                                                <i class="fa fa-edit"></i>
                                                Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>

                                            <a class="btn btn-xs"
                                                onclick="deleteFounder({{ $items->id_container }})" >
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </a>
                                            <form id="delete-form-{{ $items->id_container }}" 
                                                action="{{route('admin.delete_admin_tentangkami',$items->id_container)}}" 
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                </td>             
                          </tbody>
                          @endforeach  
                        </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      <!-- Table -->
        {{-- @endforeach --}}

        <div class="row">
          <div class="col-sm-12">
              <div class="ibox">
                <div class="ibox-title">
                  <h5 class="text-center">Histori perusahaan</h5>
                  <div class="ibox-tools">
                    <a type="button" class="btn btn-xs btn-info "style="color: white;"
                    href="{{route('admin.create_histori_admin_tentangkami')}}">
                      <i class="fa fa-edit">
                        </i> Tambah 
                      </a>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            @foreach($histori as $his)
              <div class="ibox">
                  <div class="ibox-title">
                    <h5 class="text-center"></h5>
                    <div class="ibox-tools">
                      <a type="button" class="btn btn-xs btn-warning "style="color: white;"
                        href="{{route('admin.edit_histori_tentangkami',$his->id_container)}}">
                        <i class="fa fa-edit">
                          </i> Ubah 
                      </a>
                      <button class="btn btn-xs btn-danger" type="button" 
                        onclick="deleteHistori({{ $his->id_container }})">
                        <i class="fa fa-trash">hapus</i>
                      </button>
                      <form id="delete-form-{{ $his->id_container }}" 
                        action="{{route('admin.delete_histori_admin_tentangkami',$his->id_container)}}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                      </form>           
                    </div>
                  </div>
                  <div class="ibox-content">
                    <small>{!! $his->content_name !!}</small>
                  </div>
            </div>
            @endforeach
          </div>
        </div>

    </div>
  <!-- END DB TENTANG HEADLINE -->
{{-- 
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5 class="text-center">Tentang Damping Indonesia</h5>
                <div class="ibox-tools">
                  <a type="button" class="btn btn-xs btn-light" 
                  href="">
                    <i class="fa fa-edit">
                      </i> Ubah 
                    </a>
                </div>
            </div>
            
            <div class="ibox-content">
              <small></small>
            </div>
        </div>
      </div>
    </div>
  </div> --}}
  
@endsection

@push('js')
  <script>
    function deleteFounder(id_container){
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
  function deleteHistori(id_container){
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