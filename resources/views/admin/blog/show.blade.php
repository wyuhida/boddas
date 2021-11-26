@extends('layouts.backend.app')

@section('title','Blog')
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
                <h2>Artikel List</h2>
                <div class="pull-right">
                  <a type="button" href="{{route('admin.create_admin_blog')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                  {{-- <a type="button" href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a> --}}
                </div>
                <p>
                    Artikel List
                </p>
                <br />
                <form action="{{ route('admin.show_admin_blog')}}" method="GET">
                    <div class="input-group">
                        <input type="text" placeholder="Cari Nama" name="cari" class="input form-control" value="{{request()->query('cari')}}">
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                        </span>
                    </div>
                </form>
               
                <div class="clients-list">
                  <table class="table table-hover dataTables-example table-responsive">
                    <thead>
                      <tr>
                       
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Pratinjau Artikel</th>
                        <th>Tanggal Publish</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    @forelse($show_blog as $key => $blog)
                    <tbody>
                        <td>{{$key+1}}</td>
                        <td>
                          <img src="{{ asset('image/artikel')}}/{{$blog->thumbnail}}"
                           alt="" srcset="" style="width: 100px;">
                        </td>
                        <td>{{$blog->title}}</td>
                        
                        <td>
                          {{ 
                            Str::limit(strip_tags(htmlspecialchars_decode($blog->body_news))) 
                          }}
                          <a href="{{route('admin.detail_admin_blog', $blog->id)}}">selengkapnya</a>
                          </td>
                        <td>{{$blog->created_at}}</td>
                        <td>
                            <a type="button" href="{{route('admin.edit_admin_blog',$blog->id)}}"  
                                class="btn btn-xs btn-warning">
                                <i class="fa fa-refresh"></i> Ubah 
                            </a> 
                            <button class="btn btn-xs btn-danger" type="button" 
                            onclick="deleteBlog({{$blog->id}})">
                                <i class="fa fa-trash">Hapus</i>
                            </button>
                            <form id="delete-form-{{$blog->id}}" 
                                action="{{route('admin.delete_admin_blog',$blog->id)}}" 
                              method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                        </td>
                    </tbody> 
                    @empty
                       <tbody>
                        <tr>
                            <td colspan="6">Tidak Ada Data</td>
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
    function deleteBlog(id){
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