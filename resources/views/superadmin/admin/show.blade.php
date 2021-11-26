@extends('layouts.backend.app')

@section('title','Admin Users')
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
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <h2>Admin List</h2>
                <div class="pull-right">
                  <a type="button" href="{{route('superadmin.create_user_admin')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                  {{-- <a type="button" href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a> --}}
                </div>
                <p>
                    Admin List
                </p>
                <br />
                <form action="{{ route('superadmin.show_user_admin')}}" method="GET">
                    <div class="input-group">
                        <input type="text" placeholder="Cari Nama" name="cari" class="input form-control" value="{{request()->query('cari')}}">
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                        </span>
                    </div>
                </form>

                <div class="clients-list">
                  <table class="table  table-hover dataTables-example table-responsive">
                    <thead>
                      <tr>
                       
                        <th>No</th>
                        <th>Id Admin</th>
                        <th>Nama</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    @forelse($show_admin as $key => $admin)
                    <tbody>
                        <td>{{$key + 1}}</td>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->fullname}}</td>
                        <td>
                            @if($admin->is_active == 1)
                                <span class="label label-info">Aktif</span>
                            @else
                                <span class="label label-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a type="button" href="{{route('superadmin.edit_user_admin',$admin->id)}}"  
                                class="btn btn-xs btn-warning">
                                <i class="fa fa-refresh"></i> Ubah 
                            </a> 
                            <button class="btn btn-xs btn-danger" type="button" 
                            onclick="deleteAdmin({{$admin->id}})">
                                <i class="fa fa-trash">Hapus</i>
                            </button>
                            <form id="delete-form-{{$admin->id}}" 
                                action="{{route('superadmin.delete_user_admin',$admin->id)}}" 
                              method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                        </td>
                    </tbody> 
                    @empty
                       <tbody>
                        <tr>
                            <td colspan="5">Tidak Ada Data</td>
                        </tr> 
                       </tbody>
                    @endforelse
                  </table>

                </div>
            </div>
        </div>
    </div>
  </div>
  
  
@endsection

@push('js')

<script>
    function deleteAdmin(id){
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