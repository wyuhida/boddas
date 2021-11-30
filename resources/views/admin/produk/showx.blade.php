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
        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Nama Produk</label>
                <input type="text" placeholder="Search" class="input form-control" 
                    name="search" value="{{ request()->query('search')}}">
            </div>
        </div>
        {{-- <div class="col-sm-2">
            <div class="form-group">
                <label class="control-label" for="price">Price</label>
                <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
            </div>
        </div> --}}
        {{-- <div class="col-sm-2">
            <div class="form-group">
                <label class="control-label" for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
            </div>
        </div> --}}

        <div class="col-sm-4">
            <div class="form-group">
                    <label class="control-label" for="price">Filter Stok</label>
                    <select name="status" class="form-control">
                        <option value="out">Stok Habis</option>
                        <option value="in">Tersedia</option>
                    </select>
            </div>
        </div>

        {{-- <div class="col-sm-4"> --}}
            {{-- <form action="{{ route('admin.show_admin_produk')}}" method="GET" > --}}

            {{-- <div class="form-group">
                <select name="status" class="form-control">
                    <option value="out">Stok Habis</option>
                    <option value="in">Tersedia</option>
                </select>
            </div> --}}

            {{-- <div class="form-group">
                <label class="control-label" for="status">Status</label>
                <select name="status" id="status-filter" class="form-control filter">
                    <option value="0">-- Filter stok --</option>
                    <option name="instock" value="1">
                        <a href="/?instock" name="instock">Stok Habis</a>
                    </option>
                    <option value="2">
                        <a href="" name="">Tersedia</a>
                    </option>
                </select>
            </div> --}}


            {{-- </form> --}}
        {{-- </div> --}}

        {{-- <div class="col-sm-12">
            <div class="form-group">
                <form action="{{ route('admin.show_admin_produk')}}" method="GET" >
                <input type="text" placeholder="Search" class="input form-control" 
                    name="search" value="{{ request()->query('search')}}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-primary" style="margin-top: 10px;">
                             <i class="fa fa-search"></i> Search</button>
                    </span>
                </form>
            </div>
        </div> --}}
       
        <div class="col-sm-2">
           <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-filter"></i> Filter/Search</button>
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
                    class="footable table table-stripped toggle-arrow-tiny"
                    data-page-size="15"
                    id="#table"
                    >
                    
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
                 
                    @foreach($item as $key => $items)
                    <tbody>
                       
                       
                        <tr>
                            <td>
                            {{$items[0]->item_name}}
                            </td>
                            <td>
                                <img class="tampilan_cover" 
                                    src="{{ asset('image/product')}}/{{$items[0]->photo}}" alt="" srcset="" width="50px;" height="70px;">
                            </td>
                            <td>
                                {{$items[0]->created_at}}
                            </td>
                            <td>
                                {{$items[0]->detail_product}}
                            </td>
                            <td>
                                {{$items[0]->updated_at}}
                            </td>
                            <td>
                               @if($items[0]->total_sold == '' || null)
                                    0
                                @else
                                    {{$items[0]->total_sold}}
                                @endif
                            </td>
                            <td>
                               
                                @if($items[0]->total_stock == 0)
                                    <span class="label label-danger">Habis</span>
                                @elseif($items[0]->total_stock > 1 && $items[0]->total_stock < 10)
                                    <span class="label label-warning">Hampir Habis</span>
                                @else
                                <span class="label label-primary">Tersedia</span>
                                @endif
                            </td>
                            <td>
                                 {{$items[0]->total_stock}}
                                </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-primary btn btn-xs">View</button>
                                    <a href="{{route('admin.edit_admin_produk',$items[0]->id_item)}}"
                                    class="btn-warning btn btn-xs">Edit</a>
                                    <button class="btn-danger btn btn-xs"
                                    onclick="deleteProduct({{$items[0]->id_item}})" >Hapus</button>
                                    <form id="delete-form-{{$items[0]->id_item}}" 
                                        action="{{route('admin.delete_admin_produk',$items[0]->id_item)}}" 
                                      method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                    
                                </div>
                            </td>
                        </tr>
                  
                    </tbody>
                        {{-- @empty
                            <span>No result</span> --}}
                    @endforeach
                  
                    <tfoot>
                            <tr>
                                <td colspan="6">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                    </tfoot>
                </table>
               

            </div>
        </div>
    </div>
</div>
@endsection
     <!-- FooTable -->
   
 
@push('js')


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