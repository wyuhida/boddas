<aside id="page-aside" class=" page-aside aside-fixed">
    <div class="sidenav darkNav">
        <a href="index.html" class="app-logo d-flex flex flex-row align-items-center overflow-hidden justify-content-center">
            <i class="icon-Paper-Plane inline-icon rounded avatar32 d-inline-flex align-items-center justify-content-center"></i>
            <span class="logo-text d-inline-flex"> <span class='font700 d-inline-block mr-1'>ASSAN</span> UI</span>
        </a>
        <div class="flex">
            <div class="aside-content slim-scroll">
                <ul class="metisMenu" id="metisMenu">
                    <li class="nav-title">Main<span class="nav-thumbnail">MN</span></li>

                    @if(Request::is('superadmin*'))
                        <li class="{{Request::is('superadmin/dashboard') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name ="dashboard" href="{{ route('superadmin.dashboard')}}">
                                <span class="nav-text">
                                    Dashboard 
                                </span>
                            </a>
                        </li>
                        
                        <li class="{{Request::is('superadmin/show_user_admin') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name ="show_user_admin" href="{{ route('superadmin.show_user_admin')}}">
                                <span class="nav-text">
                                    Admin 
                                </span>
                            </a>
                        </li>
                        
                        <li class="{{Request::is('superadmin/show_superadmin_blog') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name ="show_superadmin_blog" href="{{ route('superadmin.show_superadmin_blog')}}">
                                <span class="nav-text">
                                    Blog 
                                </span>
                            </a>
                        </li>
                    @endif

                    @if(Request::is('admin*'))
                        <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name ="dashboard" href="{{ route('admin.dashboard')}}">
                                <span class="nav-text">
                                    Dashboard 
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/admin_tentangkami') ? 'active' : ''}}"> 
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name="tentangkami" href="{{ route('admin.admin.admin_tentangkami')}}">
                                <span class="nav-text">
                                    Tentang Kami 
                                </span>
                            </a>
                        </li>

                        <li class="{{Request::is('admin/admin_kontak') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name="admin_kontak" href="{{ route('admin.admin_kontak')}}">
                                <span class="nav-text">
                                    Kontak
                                </span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/show_admin_kategori') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name="kategori" href="{{ route('admin.show_admin_kategori')}}">
                                <span class="nav-text">
                                    Kategori
                                </span>
                            </a>
                        </li>
        
                        <li class="{{Request::is('admin/show_admin_blog') ? 'active' : ''}}">
                            <i class="icon-Gaugage nav-thumbnail"></i>
                            <a name ="show_admin_blog" href="{{ route('admin.show_admin_blog')}}">
                                <span class="nav-text">
                                    Blog
                                </span>
                            </a>
                        </li>

                        <li class="{{Request::is('admin/show_admin_produk') ? 'active' : ''}}"> 
                            <i class="icon-Split-Vertical2 nav-thumbnail"></i>
                            <a class="has-arrow" href="javascript:void(0)">

                                <span class="nav-text">
                                    Produk 
                                </span>
                            </a>
                            <ul aria-expanded="false">
                                <li><span class="nav-thumbnail">Ls</span>
                                    <a href="{{ route('admin.show_admin_produk')}}">List Produk</a>
                                </li>
                                <li><span class="nav-thumbnail">Th</span>
                                    <a href="{{ route('admin.create_admin_produk')}}">Tambah Produk</a>
                                </li>
                            
                            </ul>
                        </li><!--Menu-item-->
                    @endif

                      <!-- CUSTOMER -->
                    @if(Request::is('customer*'))
                        <li class="{{Request::is('customer/dashboard') ? 'active' : ''}}">
                            <a href="{{ route('customer.customer.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                        </li>
                        {{-- <li class="active">
                            <a href="index.html">
                            <i class="fa fa-th-large"></i>
                            <span class="nav-label">Dashboards</span>
                            <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                            <li><a href="index.html">Dashboard v.1</a></li>
                            <li class="active">
                                <a href="dashboard_2.html">Dashboard v.2</a>
                            </li>
                            <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                            <li><a href="dashboard_5.html">Dashboard v.5</a></li>
                            </ul>
                        </li> --}}
                    @endif
                        
                    <!-- RESELER -->
                    @if(Request::is('reseler*'))
                        <li class="{{Request::is('reseler/dashboard') ? 'active' : ''}}">
                            <a href="{{ route('reseler.reseler.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Reseler</span></a>
                        </li>
                    @endif
                    
                    <!-- AFILIATE -->
                    @if(Request::is('afiliate*'))
                        <li class="{{Request::is('afiliate/dashboard') ? 'active' : ''}}">
                            <a href="{{ route('afiliate.afiliate.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Afiliate</span></a>
                        </li>
                    @endif

                </ul>
            </div><!-- aside content end-->
        </div><!-- aside hidden scroll end-->
        <div class="aside-footer p-3 pl-25">
            <div class="">
                App Version - 1.0
            </div>
        </div><!-- aside footer end-->
    </div><!-- sidenav end-->
</aside>