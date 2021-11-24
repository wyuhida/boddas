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

}
</style>
@endpush

@section('content')
    <!--- DB TENTANG HEADLINE --> 
  <div class="row">

    {{-- @foreach($cms_tentang_headline as $key => $cth) --}}
     <!-- table-->
  <div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                
                <h2>Content List</h2>           
                <br />
                <div class="ibox-tools ibox float-e-margins">
                    {{-- <a type="button" class="btn btn-xs btn-info text-white-abs"><i class="fa fa-plus" href="{{ route('tambahdata_banner_beranda') }}"></i> Tambah</a>&nbsp; --}}
                    <a type="button" href="" class="btn btn-xs btn-info text-white-abs">
                      <i class="fa fa-plus"></i> Tambah</a>&nbsp;
                </div>

                <form action="" method="GET">
                    <div class="input-group">
                            <input type="text" placeholder="Search" class="input form-control" 
                            name="search" value="{{ request()->query('search')}}">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                            </span>
                    </div>
                </form>

                <div class="clients-list">
                  <table class="table table-striped table-hover dataTables-example">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Status Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @foreach ($item as $key=> $items)
                    <tbody>
                       
                           <td>{{ $key + 1}}</td>
                           <td>{{ $items->container_name }}</td>
                           <td>{{$items->content_name }}</td>
                           <td>
                              @if($items->status_name == 1)
                                <span class="label label-info">Aktif</span>
                              @else
                                <span class="label label-danger">Tidak Aktif</span>
                                @endif
                           </td>
                           <td>
                            <a type="submit" href="{{route('admin.admin_edit_tentangkami',$items->id)}}" class="btn btn-xs btn-warning">
                              <i class="fa fa-refresh"></i> Ubah 
                          </a> 

                              <button class="btn btn-xs btn-danger" type="button" 
                                  onclick="deleteTtk({{ $items->id }})">
                                      <i class="fa fa-trash">hapus</i>
                              </button>
                              <form id="delete-form-{{ $items->id }}" 
                                  action=""
                                  method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
          
                              </form>
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
  </div>
  <!-- END DB TENTANG HEADLINE -->
  
@endsection

@push('js')
  <script>
    function deleteTtk(id){
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
            document.getElementById('delete-form-' + id).submit();    
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