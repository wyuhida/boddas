@extends('layouts.backend.app')

@section('title','Kontak')
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
<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-Server-2"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h3>List Kontak</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-end h-md-down">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb no-padding bg-trans mb-0">
                        <li class="breadcrumb-item"><a href=""><i class="icon-Home mr-2 fs14"></i></a></li>
                        <li class="breadcrumb-item">Kontak</li>
                        <li class="breadcrumb-item active">List Kontak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content d-flex flex">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="portlet-box">
            <div class="portlet-header flex-row flex d-flex align-items-center">
              <div class="flex d-flex flex-column">
                {{-- <h3>Basic</h3>
                <span>Table example</span> --}}
              </div>
              <div class="portlet-tools">
                <ul class="nav">
                  <li class="nav-item">
                    <a
                      href="{{route('admin.add_admin_kontak')}}"
                      class="btn btn-sm btn-primary">
                      <i class="fa fa-plus fs10 mr-1"></i>
                      Tambah
                    </a>
                  </li>
                </ul>
              </div>
            </div>
  
            <div class="portlet-body no-padding">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th>nama perusahaan</th>
                        <th>desc company</th>
                        <th>email</th>
                        <th>facebook</th>
                        <th>instagram</th>
                        <th>youtube</th>
                        <th>update by</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admin_kontak as $key => $adk)
                    <tbody>
                  
                        @if($admin_kontak == '' || null)
                        <td colspan="10">
                            <div class="text-center">No Data</div>
                        </td>
                    @else
                      <td>{{$adk->company_name}}</td>
                      <td>{!! \Illuminate\Support\Str::limit($adk->desc_company, 20, '...')!!}</td>
                      <td>{{$adk->email}}</td>
                      
                      <td>{{$adk->facebook}}</td>
                      <td>{{$adk->instagram}}</td>
                      <td>{{$adk->youtube}}</td>
                          @if($adk->update_by == auth()->user()->id_role)
                                  <td>{{ auth()->user()->fullname }}</td>
                          @else
                              <td>unknow</td>
                          @endif
                      <td>{{$adk->created_at}}</td>
                      <td>{{$adk->updated_at}}</td>
                      <td>
                          <a type="button" href="{{route('admin.edit_admin_kontak',$adk->id)}}"  
                              class="btn btn-xs btn-warning">
                              <i class="fa fa-refresh"></i> Ubah 
                          </a> 
                          <button class="btn btn-xs btn-danger" type="button" 
                          onclick="deleteKontak({{$adk->id}})">
                              <i class="fa fa-trash">Hapus</i>
                          </button>
                          <form id="delete-form-{{$adk->id}}" 
                              action="{{route('admin.delete_admin_kontak',$adk->id)}}" 
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </td>
                    
                        @endif
                        
                    </tbody>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@push('js')

<script>
    function deleteKontak(id){
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