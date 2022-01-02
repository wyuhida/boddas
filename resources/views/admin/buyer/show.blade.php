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
                <h2>List Pesan</h2>
                <div class="pull-right">
                  <a type="button" href="{{route('admin.create_buyer_diskon')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                  {{-- <a type="button" href="" class="btn btn-sm btn-warning"> <i class="fa fa-arrow-left"> </i> Kembali </a> --}}
                </div>
                <p>
                    List Pesan
                </p>
                <br />
                {{-- <form action="{{ route('admin.show_admin_afiliate')}}" method="GET">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">Cari Nama</label>
                            <div class="input-group m-b">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button> 
                                </span> 
                                <input type="text" class="form-control" name="cari" 
                                value="{{ request()->query('cari')}}">
                            </div>
                           
                        </div>
                    </div>
                </form>
                <div class="form-group">
                    <div class="col-sm-12">
                        <a href="{{route('admin.show_admin_afiliate')}}" 
                        class="btn btn-sm btn-info">
                            Reset semua
                        </a>
                    </div>
                </div> --}}
     
                <div class="clients-list">
                  <table class="table table-striped table-hover dataTables-example">
                    <thead>
                        {{-- <strong>Total Pesan : {{$total}}</strong> --}}
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Minimal Stok</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    @foreach($s_buyer as $key => $sb)
                      <tbody>
                        <tr>
                        <td>{{$key+1}}</td>
                         <td>{{$sb->buyer}}</td>
                         <td>{{$sb->stock_limit}}</td>
                         <td>{{$sb->discount_percentage * 100 }} %</td>
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
                                        <a href="{{route('admin.edit_buyer_diskon',$sb->id)}}"
                                            class="btn btn-xs">
                                            <i class="fa fa-edit"></i>
                                            Edit</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
      
                                      <a class="btn btn-xs"
                                      onclick="deleteBuyerDiskon({{$sb->id}})" >
                                      <i class="fa fa-trash"></i>
                                      Hapus
                                  </a>
                                  <form id="delete-form-{{$sb->id}}" 
                                      action="{{route('admin.delete_buyer_diskon',$sb->id)}}" 
                                      method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                        
                                    </li>
                                </ul>
                            </div>
                         </td>
                        </tr>
                      </tbody>
                      @endforeach
                  </table>
                 
                </div>
                <div class="ibox">
                  <div class="ibox-content">
                    <div class="text-center">
                      {{-- {!! $s_pesan->render('customPagination') !!} --}}
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
    function deleteBuyerDiskon(id){
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



