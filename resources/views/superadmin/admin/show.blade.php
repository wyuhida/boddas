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
<link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

<link href="{{asset('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endpush

@section('content')
{{-- <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h2>Admin List</h2>
                    <div class="pull-right">
                      <a type="button" href="{{route('superadmin.create_user_admin')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                    </div>
                    <p>
                        Admin List
                    </p>
                </div>
                <div class="ibox-content">
                    
                    <br />
    
                    <form action="{{ route('superadmin.show_user_admin')}}" method="GET">
                        <div class="input-group col-sm-8">
                            <input type="text" placeholder="cari nama " 
                            name="cari"
                            value="{{ request()->query('cari')}}"
                            class="input form-control search-data">
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn btn-primary" style="width: auto;">
                                         <i class="fa fa-search"></i> Search
                                    </button>
                                    <a type="submit" 
                                    href="{{route('superadmin.show_user_admin')}}"
                                    class="btn btn btn-warning" style="margin-left: 10px;"> 
                                      <i class="fa fa-refresh"></i> refresh</a>
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
                               
    
                                <input data-id="{{$admin->id}}" class="toggle-class" 
                                type="checkbox" data-onstyle="success" 
                                data-offstyle="danger" data-toggle="toggle" 
                                data-on="Aktif" data-off="Non-Aktif" 
                                {{ $admin->is_active ? 'checked' : '' }}>
    
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

</div> --}}


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-sm-12">
          <div class="ibox">
              <div class="ibox-content">
                  <h2>List Reseller</h2>
                  <div class="pull-right">
                    <a type="button" href="{{route('superadmin.create_user_admin')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                    {{-- <a type="button" href="" class="btn btn-sm btn-warning"> <i class="fa fa-arrow-left"> </i> Kembali </a> --}}
                  </div>
                  <p>
                      List Reseller
                  </p>
                  <br />
                  <form action="{{route('superadmin.show_user_admin')}}" method="GET">
                  <div class="input-group col-sm-8">
                      <input type="text" placeholder="cari nama" 
                      name="cari"
                      value="{{ request()->query('cari')}}"
                      class="input form-control search-data">
                      <span class="input-group-btn">
                              <button type="submit" class="btn btn btn-primary text-center" style="min-width: 80px;"> 
                                  <i class="fa fa-search text-center"></i> Search
                                </button>
                              <a type="submit" 
                              href="{{route('superadmin.show_user_admin')}}"
                              class="btn btn btn-warning" style="margin-left: 10px; min-width: 90px;"> 
                                <i class="fa fa-refresh"></i> refresh</a>
                      </span>
                  </div>
                </form>
  
                  <div class="clients-list">
                    <table class="table table-striped table-hover dataTables-example">
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
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->fullname}}</td>
                            <td>
                               
    
                                <input data-id="{{$admin->id}}" class="toggle-class" 
                                type="checkbox" data-onstyle="success" 
                                data-offstyle="danger" data-toggle="toggle" 
                                data-on="Aktif" data-off="Non-Aktif" 
                                {{ $admin->is_active ? 'checked' : '' }}>
    
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
                          </tr>
                        </tbody>
                        @empty
                        <td colspan="6">
                          <div class="text-center">
                             Tidak Ada Data
                            <strong>
                              {{ request()->query('cari') }}
                            </strong>
                          </div>
                        </td>
                      @endforelse
                    </table>
                    <div class="ibox">
                      <div class="ibox-content">
                        <div class="text-right">
                          {!! $show_admin->render('customPagination') !!}
  
                        </div>
                      </div>
                      
                    </div>
                    
                   
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  
  
  
@endsection

@push('js')


<script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/superadmin/ubah_status_admin',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success);
                location.reload();
              }
          });
      })
    })
  </script>

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