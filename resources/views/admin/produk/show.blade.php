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
<div class="ibox-content m-b-sm border-bottom">
    <form action="{{ route('admin.show_admin_produk')}}" method="GET" >
    <div class="row">
        {{-- <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Nama Produk</label>
                <input type="text" placeholder="Search" class="input form-control" 
                    name="search" value="{{ request()->query('search')}}">
            </div>
        </div> --}}

        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Nama Produk</label>
                <input type="text" placeholder="cari" class="input form-control search-data"
                name="search" value="{{ request()->query('search')}}">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Filter Stok</label>
                    <select name="status" class="form-control">
                        <option value="">Stock Habis / Tersedia </a></option>
                        @if(request()->status == 'out')
                        <option value="out" name="out" selected>Stok Habis</option>
                        @else
                        <option value="out" name="out">Stok Habis</option>
                        @endif
                        @if(request()->status == 'in')
                        <option value="in" name="in" selected>Tersedia</option>
                        @else
                        <option value="in" name="in">Tersedia</option>
                        @endif
                    </select>
            </div>
        </div>

        <div class="col-sm-2">
           <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-filter"></i> Filter/Cari</button>
           </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
             <a href="{{route('admin.show_admin_produk')}}" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-refresh"></i>Reset Filter</a>
            </div>
         </div>
    </div>
    </form>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="pull-right">
                    <a type="button" href="{{route('admin.create_admin_produk')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah</a> 
                    {{-- <a type="button" href="" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a> --}}
                  </div>
              
                <table 
                {{-- footable table table-stripped toggle-arrow-tiny dataTables-example --}}
                
                    class="table table-striped table-hover dataTables-example table-responsive">
                    <thead>
                    <tr>

                        <th data-toggle="true">Nama Barang</th>
                        <th data-hide="phone">Foto</th>
                        <th data-hide="phone">Tanggal Input</th>
                        <th data-hide="all">Description</th>
                        <th>tanggal update </th>
                        <th>Jumlah terjual</th>
                        <th>Status stok</th>
                        <th >Jumlah stok</th>
                        <th class="text-right" data-sort-ignore="true">Action</th>
                    </tr>
                    </thead>
                       
                    @foreach($item->groupBy('id_item') as $items)
                    <tbody>
                        @foreach($items as $it)
                        <tr>
                            <td>
                            {{$it[0]->item_name}}
                            </td>
                            <td>
                                <img class="tampilan_cover" 
                                    src="{{ asset('image/product')}}/{{$it[0]->photo}}" alt="" srcset="" width="50px;" height="70px;">
                            </td>
                            <td>
                                {{$it[0]->created_at}}
                            </td>
                            <td>
                                {{-- {{$it[0]->detail_product}} --}}
                                {!! Str::limit($it[0]->detail_product,'200','..') !!}
                            </td>
                            <td>
                                {{$it[0]->updated_at}}
                            </td>
                            <td>
                               @if($it[0]->total_sold == '' || null)
                                    0
                                @else
                                    {{$it[0]->total_sold}}
                                @endif
                            </td>
                            
                               
                                @if($it[0]->total_stock == 0)
                                <td>
                                    <span class="label label-danger text-center">Habis</span>
                                </td>

                                @elseif($it[0]->total_stock > 1 && $it[0]->total_stock < 10)
                                <td>
                                    <span class="label label-warning">Hampir Habis</span>
                                </td>
                                @else
                                <td>
                                <span class="label label-primary text-center">Tersedia</span>
                                </td>
                                @endif
                            </td>
                            <td>
                                 {{$it[0]->total_stock}}
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
                                            <a href="{{route('admin.edit_admin_produk',$it[0]->id_item)}}"
                                                class="btn btn-xs">
                                                <i class="fa fa-edit"></i>
                                                Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>

                                            <a class="btn btn-xs"
                                                onclick="deleteProduct({{$it[0]->id_item}})" >
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </a>
                                            <form id="delete-form-{{$it[0]->id_item}}" 
                                                action="{{route('admin.delete_admin_produk',$it[0]->id_item)}}" 
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="btn-group" style="display: inline-block">
                                   
                                    <a href="{{route('admin.edit_admin_produk',$it[0]->id_item)}}"
                                    class="btn-warning btn btn-xs">Edit</a>
                                    <button class="btn-danger btn btn-xs"
                                    onclick="deleteProduct({{$it[0]->id_item}})" >Hapus</button>
                                    <form id="delete-form-{{$it[0]->id_item}}" 
                                        action="{{route('admin.delete_admin_produk',$it[0]->id_item)}}" 
                                      method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                </div> --}}
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