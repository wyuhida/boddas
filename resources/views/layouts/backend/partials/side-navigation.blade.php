<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                        </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->email}}</strong>
                        </span> <span class="text-muted text-xs block">{{ Auth::user()->fullname }}</span> </span> </a>
                </div>
            </li>
            @if(Request::is('admin*'))
                <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a name ="dashboard" href="{{ route('admin.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li class="{{Request::is('admin/tentangkami') ? 'active' : ''}}">
                    <a name="tentangkami" href="{{ route('admin.admin.admin_tentangkami')}}"><i class="fa fa-envelope"></i> <span class="nav-label">Tentang Kami</span></a>
                </li>
                <li class="{{Request::is('admin/kontak_perusahaan') ? 'active' : ''}}">
                    <a name="kontak_perusahaan" href="{{ route('admin.admin_kontak')}}"><i class="fa fa-address-book"></i> <span class="nav-label">Kontak</span></a>
                </li>
                <li class="{{Request::is('admin/show_admin_kategori') ? 'active' : ''}}">
                    <a name="kategori" href="{{ route('admin.show_admin_kategori')}}"><i class="fa fa-folder"></i> <span class="nav-label">Kategori</span></a>
                </li>

                <li class="{{Request::is('admin/show_admin_blog') ? 'active' : ''}}">
                    <a name ="show_admin_blog" href="{{ route('admin.show_admin_blog')}}"><i class="fa fa-book"></i> <span class="nav-label">Blog</span></a>
                </li>

                  <li class="{{Request::is('admin/show_admin_produk') ? 'active' : ''}}">
                    <a href="">
                      <i class="fa fa-archive"></i>
                      <span class="nav-label">Produk</span>
                      <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                      
                      <li class="active">
                        <a href="{{ route('admin.show_admin_produk')}}">List Produk</a>
                      </li>
                      <li><a href="{{ route('admin.create_admin_produk')}}">Tambah Produk</a></li>
                    </ul>
                </li>

            @endif

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

            @if(Request::is('superadmin*'))
            <li class="{{Request::is('superadmin/dashboard') ? 'active' : ''}}">
                <a name ="dashboard" href="{{ route('superadmin.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            
            <li class="{{Request::is('superadmin/show_user_admin') ? 'active' : ''}}">
                <a name ="show_user_admin" href="{{ route('superadmin.show_user_admin')}}"><i class="fa fa-users"></i> <span class="nav-label">Admin</span></a>
            </li>
            
            <li class="{{Request::is('superadmin/show_superadmin_blog') ? 'active' : ''}}">
                <a name ="show_superadmin_blog" href="{{ route('superadmin.show_superadmin_blog')}}"><i class="fa fa-book"></i> <span class="nav-label">Blog</span></a>
            </li>

              
                {{-- <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html">Inbox</a></li>
                        <li><a href="mail_detail.html">Email view</a></li>
                        <li><a href="mail_compose.html">Compose email</a></li>
                        <li><a href="email_template.html">Email templates</a></li>
                    </ul>
                </li> --}}
            @endif
          
            @if(Request::is('reseler*'))
            <li class="{{Request::is('reseler/dashboard') ? 'active' : ''}}">
                <a href="{{ route('reseler.reseler.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Reseler</span></a>
            </li>
            @endif

            @if(Request::is('afiliate*'))
            <li class="{{Request::is('afiliate/dashboard') ? 'active' : ''}}">
                <a href="{{ route('afiliate.afiliate.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Afiliate</span></a>
            </li>
            @endif
        </ul>

    </div>
</nav>

