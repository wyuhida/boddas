@extends('layouts.backend.app')

@section('title','Produk')
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
{{-- <div class="ibox-content m-b-sm border-bottom">
    <form action="{{ route('admin.show_admin_produk')}}" method="GET" >
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Nama Produk</label>
                <input type="text" placeholder="Search" class="input form-control" 
                    name="search" value="{{ request()->query('search')}}">
            </div>
        </div>
     
        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Filter Stok</label>
                    <select name="status" class="form-control">
                        <option value="">Stock Habis / Tersedia </a></option>
                        <option value="out">Stok Habis</option>
                        <option value="in">Tersedia</option>
                    </select>
            </div>
        </div>

        
        <div class="col-sm-2">
           <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-filter"></i> Filter/Search</button>
           </div>
        </div>
    </div>
    </form>
</div> --}}

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="pull-right">
                  </div>
              
                <table 
                {{-- footable table table-stripped toggle-arrow-tiny dataTables-example --}}
                
                    class="table table-striped table-hover dataTables-example table-responsive">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>tgl trans</th>
                        <th>nama pembeli</th>
                        <th>nilai transaksi</th>
                        <th>status</th>
                        <th class="text-right" data-sort-ignore="true">ubah status</th>
                    </tr>
                    </thead>
                       
                    @foreach($newItem->groupBy('id_transaction') as $items)
                    <tbody>
                        @foreach($items as $it)
                        <tr>
                            <td>
                            {{$it[0]->id_transaction}}
                            </td>
                            <td>
                                {{$it[0]->created_at}}
                            </td>
                            <td>
                                {{$it[0]->fullname}}
                            </td>
                            <td>
                           
                                Rp. {{number_format($it[0]->total_price)}}
                            </td>
                            <td>
                                {{$it[0]->status_name}}
                            </td>
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
                                            <a href="{{route('admin.update_status_prepare',$it[0]->id_transaction)}}"
                                                class="btn btn-xs">
                                                <i class="fa fa-edit"></i>
                                                In Prepare</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.update_status_ondelivery',$it[0]->id_transaction)}}"
                                                class="btn btn-xs">
                                                <i class="fa fa-edit"></i>
                                                On Delivery</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.update_status_finished',$it[0]->id_transaction)}}"
                                                class="btn btn-xs">
                                                <i class="fa fa-edit"></i>
                                                Finished</a>
                                        </li>
                                        {{-- <li class="divider"></li>
                                        <li> --}}
          
                                            {{-- <a class="btn btn-xs"
                                                onclick="deleteKontak({{$adk->id}})" >
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </a> --}}
                                            {{-- <form id="delete-form-{{$adk->id}}" 
                                                action="{{route('admin.delete_admin_kontak',$adk->id)}}" 
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> --}}
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endforeach
                    <tfoot>
                            <tr>
                                <td colspan="6">
                                    {{-- <ul class="pagination pull-right"></ul> --}}
                                </td>
                            </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
   
 
@push('js')

  <!-- FooTable -->
  {{-- <script src="{{ asset('assets/js/jquery-3.1.1.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script> --}}

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
    function deleteProduct(id_item){
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
            document.getElementById('delete-form-' + id_item).submit();    
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