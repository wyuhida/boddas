@extends('layouts.backend.app')

@section('title', 'List Afiliate')

@push('js')
  <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

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
                  <a type="button" href="" class="btn btn-sm btn-warning"> <i class="fa fa-arrow-left"> </i> Kembali </a>
                </div>
                <p>
                    List Afiliate
                </p>
                <br />
                <div class="input-group">
                    <input type="text" placeholder="Search layanan bisnis " class="input form-control search-data">
                    {{-- <span class="input-group-btn">
                            <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                    </span> --}}
                </div>

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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                        
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

<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    function deleteLayananBisnis(id){
        

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

@endpush



