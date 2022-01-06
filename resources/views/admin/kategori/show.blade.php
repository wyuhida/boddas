@extends('layouts.backend.app')

@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}">
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
{{-- 
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
                </form> --}}

               
                <div class="input-group">
                  <input type="text" placeholder="Cari Kategori" class="input form-control search-data">
                  {{-- <span class="input-group-btn">
                          <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                  </span> --}}
                </div>

                <div class="clients-list">
                  <table class="table table-striped table-hover dataTables-example">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Updated </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                   
                   <tbody>
                    @foreach($dataKategori as $key => $s_kat)
                      <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$s_kat->category_name}}</td>
                        @if($s_kat->is_active == 1)
                          <td><span class="label label-info">Aktif</span></td>
                        @else
                          <td><span class="label label-danger">Tidak Aktif</span></td>
                        @endif
                        <td>{{$s_kat->created_at}}</td>
                        <td>{{$s_kat->updated_at}}</td>
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
                                    <a href="{{route('admin.edit_admin_kategori',$s_kat->id)}}"
                                        class="btn btn-xs">
                                        <i class="fa fa-edit"></i>
                                        Edit</a>
                                </li>
                                <li class="divider"></li>
                                <li>
  
                                  <a class="btn btn-xs"
                                  onclick="deleteKategori({{$s_kat->id}})" >
                                  <i class="fa fa-trash"></i>
                                  Hapus
                              </a>
                              <form id="delete-form-{{$s_kat->id}}" 
                                  action="{{route('admin.delete_admin_kategori',$s_kat->id)}}" 
                                  method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>
                                    
                                </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                   </tbody>
                  </table>
                </div>
                
            </div>
           
        </div>
    </div>
  </div>
  <!-- Table -->
@endsection

@push('js') 

 <!-- Page-Level Scripts -->
 <script>
  $(document).ready(function(){
    let oTable = $('.dataTables-example').DataTable({
           language: {
              paginate: {
                previous: '←',
                next:     '→'
              },
            },
          pageLength: 5,
          responsive: true,
          // dom: '<"html5buttons"B>lTfgitp',
          bSort : false,
          lengthChange: false,
          info: false,
          searching: true
          
      });

      $('.dataTables_filter').closest('.row').hide();

      $('.search-data').keyup(function(){
        oTable.search($(this).val()).draw()
      })
  });
</script>

          
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