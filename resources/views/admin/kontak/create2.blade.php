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
              <div class="list-thumb ml-0 mr-3 pr-3 b-r text-muted">
                <i class="icon-Server-2"></i>
              </div>
              <div class="list-body">
                <div class="list-title fs-2x">
                  <h3>Tambah Kontak</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 d-flex justify-content-end h-md-down">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb no-padding bg-trans mb-0">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="icon-Home mr-2 fs14"></i></a>
              </li>
              <li class="breadcrumb-item">Kontak</li>
              <li class="breadcrumb-item active">Tambah Kontak</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="portlet-box portlet-gutter ui-buttons-col  mb-30 pt-30 mb-30">
        <div class="portlet-header flex-row flex d-flex align-items-center b-b">
            <div class="flex d-flex flex-column">
                <h3>Tambah Kontak</h3> 
            </div>
            <div class="portlet-tools">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('admin.admin_kontak')}}" 
                            class="btn btn-sm btn-light">
                            <i class="fa fa-arrow-left fs10 mr-1"></i> Kembali
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white  p-3 border1 rounded">
            <div role="form">
                <div class="title-sep sep-white text-left text-primary mb-10">
                    <span class="rounded">Profile Settings</span>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input id="fname" type="text" class="form-control" placeholder="Sarah">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input id="lname" type="text" class="form-control" placeholder="Taylor">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" placeholder="@sarah856">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control" placeholder="s856@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phn">Phone</label>
                            <input id="phn" type="text" class="form-control" placeholder="+91 9887568614">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="com">Company</label>
                            <input id="com" type="email" class="form-control" placeholder="design_mylife">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="add">Address</label>
                            <input id="add" type="email" class="form-control" placeholder="123, California, Usa, 302012">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-0">
                            <label>Social Media</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-icon-group">
                                        <div class="input-icon-append">
                                            <i class="fab fa-facebook-f"></i>
                                            <input placeholder="designer.rakesh.sharma" type="text"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="input-icon-group">
                                        <div class="input-icon-append">
                                            <i class="fab fa-twitter"></i>
                                            <input placeholder="@design_mylife" type="text"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="input-icon-group">
                                        <div class="input-icon-append">
                                            <i class="fab fa-linkedin"></i>
                                            <input placeholder="rakesh.sharma856" type="text"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-6">
                                    <div class="input-icon-group">
                                        <div class="input-icon-append">
                                            <i class="fab fa-google-plus"></i>
                                            <input placeholder="RakeshUidesigner" type="text"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <select id="skills" class="form-control" data-placeholder="Select an option" multiple>
                                <option value="1" selected>Bootstrap</option>
                                <option value="2" selected>Css3</option>
                                <option value="3" selected>Html5</option>
                                <option value="4" selected>Jquery</option>
                                <option value="5">AngularJs</option>
                                <option value="1">Wordpress</option>
                                <option value="2">ReactJs</option>
                                <option value="3">VueJs</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="title-sep sep-white text-left text-primary mt-30 mb-10">
                    <span class="rounded">Account Settings</span>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ckey">Client Id</label>
                            <input id="ckey" type="text" class="form-control" disabled placeholder="dsf8f79sdfdsfsdsad99gsu7wfh">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="skey">Secret Key</label>
                            <input id="skey" type="text" class="form-control" disabled placeholder="dsf8f79sdfdsfsdsad99gsu7969">
                        </div>
                    </div>
                </div>
                <div class="title-sep sep-white text-left text-primary  mt-30 mb-10">
                    <span class="rounded">Account Settings</span>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ps1">Old Password</label>
                            <input id="ps1" type="password" class="form-control" placeholder=".......">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ps2">New Password</label>
                            <input id="ps2" type="password" class="form-control" placeholder="........">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ps3">Confirm Password</label>
                            <input id="ps3" type="password" class="form-control" placeholder="........">
                        </div>
                    </div>
                </div>
                <div class="title-sep sep-white text-left text-primary  mt-30 mb-10">
                    <span class="rounded">Notifications</span>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="customUi-checkbox checkbox-rounded checkboxUi-primary">
                            <input type="checkbox" id="noti1">
                            <label for="noti1">
                                <span class="label-checkbox"></span>
                                <span class="label-helper">Anyone seeing my profile</span>
                            </label>
                        </div><br>
                         <div class="customUi-checkbox checkbox-rounded checkboxUi-teal">
                            <input type="checkbox" id="noti2">
                            <label for="noti2">
                                <span class="label-checkbox"></span>
                                <span class="label-helper">Show new notifications</span>
                            </label>
                        </div><br>
                         <div class="customUi-checkbox checkbox-rounded checkboxUi-dark">
                            <input type="checkbox" id="noti3">
                            <label for="noti3">
                                <span class="label-checkbox"></span>
                                <span class="label-helper">Subscribe for newsletter</span>
                            </label>
                        </div><br>
                         <div class="customUi-checkbox checkbox-rounded checkboxUi-success">
                            <input type="checkbox" id="noti4">
                            <label for="noti4">
                                <span class="label-checkbox"></span>
                                <span class="label-helper">Available for Hire</span>
                            </label>
                        </div>
                    </div>
                </div>
                 <div class="title-sep sep-white text-left text-primary  mt-30 mb-10">
                    <span class="rounded">Avatar / thumbs</span>
                </div>
                <div class="form-group">
                    <label for="thumb" class="mr-2">Thumbnail</label><br>
                    <img src="images/avatar1.jpg" alt="" width="80" class="mb-20 img-fluid rounded">
                    <input id="thumb" type="file" class="form-control">
                    <span class="helper d-block fs12 text-muted pt-2">Thumnail size - 80x80 ( .jpg, .png )</span>
                </div><hr>
                <div class="form-group">
                    <label for="cover">Cover</label><br>
                    <img src="images/cover1.jpg" alt="" class="mb-20 img-fluid rounded">
                    <input id="cover" type="file" class="form-control">
                    <span class="helper d-block fs12 text-muted pt-2">Thumnail size - 1170x400 ( .jpg, .png )</span>
                </div>
                <div class="pt-3 text-right">
                    <button type="button" class="btn btn-icon btn-gradient-primary">
                        <i class="fa fa-cog"></i> Update Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection



@push('js')
