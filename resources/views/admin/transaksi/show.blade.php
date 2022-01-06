@extends('layouts.backend.app')

@section('title','Produk')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="{{asset('assets/css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('assets/css/plugins/clockpicker/clockpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css" >
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
    
   
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="price">Cari Nama</label>
                    <input type="text" placeholder="Cari" class="input form-control search-data" 
                        name="search">
                </div>
            </div>
            <form action="{{ route('admin.admin_transaksi')}}" method="GET" >
            

            {{-- <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="price">Nama Produk</label>
                    <input type="text" placeholder="Cari" class="input form-control search-data" 
                        name="search" value="{{ request()->query('search')}}">
                </div>
            </div> --}}
            <div class="col-sm-4">
                <div class="form-group">
                        <label class="control-label" for="price">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Semua</a></option>
                            @if(request()->status == 'sudah-bayar')
                                <option value="sudah-bayar" selected>Sudah Bayar</option>
                            @else
                                <option value="sudah-bayar">Sudah Bayar</option>
                            @endif
                            @if(request()->status == 'belum-bayar')
                                <option value="belum-bayar" selected>Belum Bayar</option>
                            @else
                            <option value="belum-bayar">Belum Bayar</option>
                            @endif
                            @if(request()->status == 'in-prepare')
                            <option value="in-prepare">in-prepare</option>
                            @else
                            <option value="in-prepare">in-prepare</option>
                            @endif
                            @if(request()->status == 'on-delivery')
                            <option value="on-delivery" selected>on-delivery</option>
                            @else
                            <option value="on-delivery">on-delivery</option>
                            @endif
                            @if(request()->status == 'finished')
                            <option value="finished" selected>finished</option>
                            @else
                            <option value="finished">finished</option>
                            @endif
                        </select>
                </div>
            </div>
        
            <div class="col-sm-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-filter"></i> Filter / Cari</button>
                </div>
                
            </div>
            <div class="col-sm-2">
                
                <div class="form-group">
                    <a href="{{route('admin.admin_transaksi')}}" class="btn btn-sm btn-primary form-control" style="margin-top: 20px;"><i class="fa fa-refresh"></i>Reset</a>
                </div>
            </div>
        </form>
        </div>
    
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Daftar Transaksi</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    
                    </div>
                </div>
                <div class="ibox-content">
                  
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Nilai Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-right" data-sort-ignore="true">Ubah Status</th>
                                </tr>
                            </thead>
                            @foreach($newItem->groupBy('id_transaction') as $items)
                            <tbody>
                                @foreach($items as $key => $it)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                    {{$it[0]->id_transaction}}
                                    </td>
                                    <td>
                                        {{$it[0]->created_at}}
                                    </td>
                                    <td>
                                        <dt>
                                            @if($it[0]->photo != null)
                                                <img src="{{asset('image/product')}}/{{$it[0]->photo}}" alt="" width="64">
                                            @else
                                                Tidak Ada Gambar
                                            @endif
                                        </dt>
                                        <dd>
                                            {{$it[0]->item_name}}
                                        </dd>
                                        <dd>
                                            <span class="label label-primary">jumlah : {{$it[0]->qty}}</span>
                                        </dd>
                                    </td>
                                    <td>
                                        {{$it[0]->fullname}}
                                    </td>
                                    <td>
                                        {{$it[0]->address_name}}
                                    </td>
                                    <td>
                                        <div class="lightBoxGallery">
                                            @if($it[0]->image != null)
                                            <a href="{{asset('image/pembayaran')}}/{{$it[0]->image}}" 
                                                title="{{$it[0]->fullname}}" data-gallery="">
                                                <img width="64" src="{{asset('image/pembayaran')}}/{{$it[0]->image}}">
                                            </a>
                                            <div id="blueimp-gallery" class="blueimp-gallery">
                                                <div class="slides"></div>
                                                <h3 class="title"></h3>
                                                <a class="prev">‹</a>
                                                <a class="next">›</a>
                                                <a class="close">×</a>
                                                <a class="play-pause"></a>
                                                <ol class="indicator"></ol>
                                            </div>
                                            @else
                                            <span class="label label-danger">Bukti Belum Diunggah</span>
                                            @endif
                                            
                                        </div>
                                        {{-- @if($it[0]->image != null)
                                            <img 
                                            width="64"
                                            src="{{asset('image/pembayaran')}}/{{$it[0]->image}}" 
                                            alt="" srcset=""
                                            class="img-thumbnail"
                                            >
                                        @else
                                            <span class="label label-danger">Bukti Belum Diunggah</span>
                                        @endif --}}
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
                                                @if($it[0]->id_transaction_status == 6)
                                                <a href="{{route('admin.update_status_prepare',$it[0]->id_transaction)}}"
                                                    class="btn btn-xs" disabled>
                                                    <i class="fa fa-edit"></i>
                                                    In Prepare</a>
                                                @else
                                                <a href="{{route('admin.update_status_prepare',$it[0]->id_transaction)}}"
                                                    class="btn btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                    In Prepare</a>
                                                @endif
                                            </li>
                                            
                                               
                                          
                                                <li>
                                                    @if($it[0]->id_transaction_status == 6)
                                                    <a href="{{route('admin.update_status_ondelivery',$it[0]->id_transaction)}}"
                                                        class="btn btn-xs" disabled>
                                                        <i class="fa fa-edit"></i>
                                                        On Delivery</a>
                                                    @else
                                                    <a href="{{route('admin.update_status_ondelivery',$it[0]->id_transaction)}}"
                                                        class="btn btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                        On Delivery</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{route('admin.update_status_finished',$it[0]->id_transaction)}}"
                                                        class="btn btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                        Finished</a>
                                                </li>
                                               
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
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Nilai Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-right" data-sort-ignore="true">Ubah Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <!-- FooTable -->
  {{-- <script src="{{ asset('assets/js/jquery-3.1.1.min.js')}}"></script> --}}
  {{-- <script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script> --}}
  <!-- blueimp gallery -->
  <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
  <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>

  <!-- Data picker -->
  <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
   <!-- Color picker -->
   <script src="{{asset('assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>

   <!-- Clock picker -->
   <script src="{{asset('assets/js/plugins/clockpicker/clockpicker.js')}}"></script>
  <script>
      $( document ).ready(function() {
        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
    });
    

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