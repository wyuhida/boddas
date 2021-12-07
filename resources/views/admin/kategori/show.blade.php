@extends('layouts.backend.app')

@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
 
@endpush

@section('content')
     <!-- table-->
  <div class="row">
    <div class="col-sm-12">
        <div class="ibox">
          <div class="ibox-title">
            <h2>Kategori List</h2>   
          </div>
            <div class="ibox-content">
                
                      
                <br />
                
                <div class="ibox-tools ibox float-e-margins">
                  {{-- <a type="button" class="btn btn-xs btn-info text-white-abs"><i class="fa fa-plus" href="{{ route('tambahdata_banner_beranda') }}"></i> Tambah</a>&nbsp; --}}
                  <a type="button" href="{{route('admin.create_admin_kategori')}}" 
                  class="btn btn-xs btn-info text-white-abs" style="color: white">
                    <i class="fa fa-plus"></i> Tambah</a>&nbsp;
              </div>

                <form action="{{ route('admin.show_admin_kategori')}}" method="GET">
                  <div class="input-group col-sm-8">
                      <input type="text" placeholder="Cari Kategori" 
                      name="cari"
                      value="{{ request()->query('cari')}}"
                      class="input form-control search-data">
                      <span class="input-group-btn">
                              <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                              <a type="submit" 
                              href="{{route('admin.show_admin_kategori')}}"
                              class="btn btn btn-warning" style="margin-left: 10px;"> 
                                <i class="fa fa-refresh"></i> refresh</a>
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
                    @forelse ($s_kat as $key => $p)
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
                          <button data-toggle="dropdown" 
                              class="btn dropdown-toggle">
                              
                              Atur 
                              <span class="caret">
                                 
                              </span>
                            
                          </button>
                          <ul class="dropdown-menu text-center" >
                              <li>
                                  <a href="{{route('admin.edit_admin_kategori',$p->id)}}"
                                      class="btn btn-xs">
                                      <i class="fa fa-edit"></i>
                                      Edit</a>
                              </li>
                              <li class="divider"></li>
                              <li>

                                <a class="btn btn-xs"
                                onclick="deleteKategori({{$p->id}})" >
                                <i class="fa fa-trash"></i>
                                Hapus
                            </a>
                            <form id="delete-form-{{$p->id}}" 
                                action="{{route('admin.delete_admin_kategori',$p->id)}}" 
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                                  
                              </li>
                          </ul>
                        </div>
                      </td>
                      
                    </tbody>
                    @empty
                    <td colspan="7">
                      <div class="text-center">
                         Tidak Ada Data
                        <strong>
                          {{ request()->query('cari') }}
                        </strong>
                      </div>
                    </td>
                    @endforelse
                   
                  </table>
                  <nav aria-label="Page navigation example" class="mb70 text-right">
                    <ul class="pagination pagination justify-content-end">
                        {{-- <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                        {!! $s_kat->render('customPagination') !!}
                    </ul>
                </nav>

                 
                </div>
                
            </div>
           
        </div>
    </div>
  </div>
  <!-- Table -->
@endsection

@push('js') 

          
          <script>
            function deleteKategori(id){
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