@extends('layouts.backend.app')

@section('title', 'List Afiliate')

@push('js')
  <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
  @endpush

@section('content')    
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <h2>List Afiliate</h2>
                <div class="pull-right">
                  {{-- <a type="button" href="" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Layanan Bisnis</a>  --}}
                  {{-- <a type="button" href="" class="btn btn-sm btn-warning"> <i class="fa fa-arrow-left"> </i> Kembali </a> --}}
                </div>
                <p>
                    List Afiliate
                </p>
                <br />
                <form action="{{ route('admin.show_admin_afiliate')}}" method="GET">
                  <div class="input-group col-sm-4">
                    <input type="text" placeholder="cari nama" 
                    name="cari"
                    value="{{ request()->query('cari')}}"
                    class="input form-control search-data">
                    <span class="input-group-btn">
                            <button type="submit" 
                            class="btn btn btn-primary">
                             <i class="fa fa-search"></i></button>
                            
                    </span>
                  </div>
              </form>

     
                <div class="clients-list">
                  <table class="table table-striped table-hover dataTables-example">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Provinsi</th>
                        <th>Omset</th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    @forelse($s_show_afiliate as $key => $s_sa)
                      <tbody>
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$s_sa->id}}</td>
                          <td>{{$s_sa->fullname}}</td>
                          <td></td>
                          <td></td>
                          <td>
                           
                            <input data-id="{{$s_sa->id}}" class="toggle-class" 
                            type="checkbox" data-onstyle="success" 
                            data-offstyle="danger" data-toggle="toggle" 
                            data-on="Aktif" data-off="Non-Aktif" 
                            {{ $s_sa->is_active ? 'checked' : '' }}>
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
                 
                </div>
                <div class="ibox">
                  <div class="ibox-content">
                    <div class="text-right">
                      {!! $s_show_afiliate->render('customPagination') !!}
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
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/ubah_status',
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
   var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });
</script>

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    function update_status(id){
        

        Swal.fire({
        title: 'Apa anda yakin?',
        text: "Apakah anda yakin ingin menghapus ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ya, hapus!',
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
        'Your imaginary file is safe :)',
        'error'
        )
        }
        })
    }

</script>


  <!-- Page-Level Scripts -->
  {{-- <script>
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
  </script> --}}
   <!-- iCheck -->
   <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
   <script>
       $(document).ready(function () {
           $('.i-checks').iCheck({
               checkboxClass: 'icheckbox_square-green',
               radioClass: 'iradio_square-green',
           });
       });
   </script>

@endpush



