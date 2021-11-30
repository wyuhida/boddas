@extends('layouts.backend.app')

@section('title','Company')
@push('css')

@endpush
@section('content')

<div class="page-subheader mb-30">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="list">
                    <div class="list-item pl-0">
                        <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                            <i class="icon-Server-2"></i>
                        </div>
                        <div class="list-body">
                            <div class="list-title fs-2x">
                                <h3>List Tentang Kami</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-end h-md-down">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb no-padding bg-trans mb-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-Home mr-2 fs14"></i></a></li>
                        <li class="breadcrumb-item">Tentang Kami</li>
                        <li class="breadcrumb-item active">List Tentang Kami </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content d-flex flex">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="portlet-box">
                    <div class="portlet-header flex-row flex d-flex align-items-center">
                        <div class="flex d-flex flex-column">
                            {{-- <h3>Basic</h3> 
                            <span>Table example</span> --}}
                        </div>
                        <div class="portlet-tools">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a target="_blank" href="" 
                                        class="btn btn-sm btn-light">
                                        <i class="fa fa-exclamation fs10 mr-1"></i> Help
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="portlet-body no-padding">
                        <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach ($item as $key=> $items)
                            <tbody>
                            
                                <td>{{ $key + 1}}</td>
                                <td>{{ $items->container_name }}</td>
                                <td>{{$items->content_name }}</td>
                                <td>
                                    @if($items->status_name == 1)
                                        <span class="label label-info">Aktif</span>
                                    @else
                                        <span class="label label-danger">Tidak Aktif</span>
                                        @endif
                                </td>
                                <td>
                                    <a type="submit" href="{{route('admin.admin_edit_tentangkami',$items->id)}}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-refresh"></i> Ubah 
                                </a> 
        
                                    <button class="btn btn-xs btn-danger" type="button" 
                                        onclick="deleteTtk({{ $items->id }})">
                                            <i class="fa fa-trash">hapus</i>
                                    </button>
                                    <form id="delete-form-{{ $items->id }}" 
                                        action=""
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                
                                    </form>
                                </td>             
                            </tbody>
                        @endforeach  
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush