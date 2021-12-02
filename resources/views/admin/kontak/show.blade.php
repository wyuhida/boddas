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
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <h2>Kontak</h2>
                <div class="pull-right">
                  <a type="button" href="{{route('admin.add_admin_kontak')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                  {{-- <a type="button" href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a> --}}
                </div>
                <p>
                    Kontak
                </p>
                <br />
                <div class="input-group">
                    <input type="text" placeholder="Search" class="input form-control search-data">
                    {{-- <span class="input-group-btn">
                            <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                    </span> --}}
                </div>

                <div class="clients-list">
                  <table class="table table-striped table-hover dataTables-example table-responsive">
                    <thead>
                      <tr>
                       
                        <th>Perusahaan</th>
                        <th>Alamat</th>
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
                    @foreach ($admin_kontak as $key => $adk)
                    <tbody>
                  
                        @if($admin_kontak == '' || null)
                        <td colspan="10">
                            <div class="text-center">No Data</div>
                        </td>
                    @else
                    {{-- <td>{!! \Illuminate\Support\Str::limit($adk->desc_company, 20, '...')!!}</td> --}}
                      <td>{{$adk->company_name}}</td>
                      <td>{{$adk->address_name}}</td>
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
                  </table>

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