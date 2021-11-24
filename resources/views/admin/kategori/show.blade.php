@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
     <!-- table-->
  <div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                
                <h2>Kategori List</h2>           
                <br />
                <div class="ibox-tools ibox float-e-margins">
                    {{-- <a type="button" class="btn btn-xs btn-info text-white-abs"><i class="fa fa-plus" href="{{ route('tambahdata_banner_beranda') }}"></i> Tambah</a>&nbsp; --}}
                    <a type="button" href="{{route('admin.create_admin_kategori')}}" class="btn btn-xs btn-info text-white-abs">
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
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Update By </th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Updated </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @foreach ($s_produk as $key => $p)
                    <tbody>
                      <td>{{$key + 1}}</td>
                      <td>{{$p->category_name}}</td>
                      @if($p->is_active == 1)
                        <td><span class="label label-info">Aktif</span></td>
                      @else
                        <td><span class="label label-danger">Non aktif</span></td>
                      @endif
                      <td>{{$p->update_by}}</td>
                      <td>{{$p->created_at}}</td>
                      <td>{{$p->updated_at}}</td>
                      <td>
                        <div class="btn-group">
                                   
                                    <button class="btn-warning btn btn-xs">Edit</button>
                                    <button class="btn-danger btn btn-xs" >Hapus</button>
                               
                                    <form id="delete-form-{{$p->id}}" 
                                        action="{{route('admin.delete_admin_produk',$p->id)}}" 
                                      method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                    
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
@endsection

@push('js')

  
<script>
  function deleteProduct(id){
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