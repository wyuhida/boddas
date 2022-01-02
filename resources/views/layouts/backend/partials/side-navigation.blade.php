<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center"> <span>
                        <img alt="image" class="img-circle" src="{{asset('image/profile')}}/{{auth()->user()->foto}}" style="width: 70px;"/>
                        </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->email}}</strong>
                        </span> <span class="text-muted text-xs block">{{ Auth::user()->fullname }}</span> </span> </a>
                </div>
            </li>
            @if(Request::is('admin*'))
            <li class="{{Request::is('home/index') ? 'active' : ''}}">
                <a name ="home" href="{{ route('home.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
            </li>
                <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a name ="dashboard" href="{{ route('admin.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li class="{{Request::is('admin/promosi_pengenalan') ? 'active' : ''}}">
                    <a name ="promosi_pengenalan" href="{{ route('admin.promosi_pengenalan')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Promosi</span></a>
                </li>
                <li class="{{Request::is('admin/tentangkami') ? 'active' : ''}}">
                    <a name ="tentangkami" href="{{ route('admin.admin_tentangkami')}}">
                        <i class="fa fa-address-card"></i> <span class="nav-label">Tentang Kami</span></a>
                </li>
                {{-- <li class="{{Request::is('admin/tentangkami') ? 'active' : ''}}">
                    <a href="">
                        <i class="fa fa-archive"></i>
                        <span class="nav-label">Tentang Kami</span>
                        <span class="fa arrow"></span>
                      </a>
                      <ul class="nav nav-second-level">
                        
                        <li class="active">
                          <a href="{{ route('admin.admin_tentangkami')}}">Founder</a>
                        </li>
                        <li><a href="">Histori Perusahaan</a></li>
                      </ul>
                </li> --}}
                <li class="{{Request::is('admin/kontak_perusahaan') ? 'active' : ''}}">
                    <a name="kontak_perusahaan" href="{{ route('admin.admin_kontak')}}"><i class="fa fa-address-book"></i> <span class="nav-label">Kontak</span></a>
                </li>
                <li class="{{Request::is('admin/show_admin_kategori') ? 'active' : ''}}">
                    <a name="kategori" href="{{ route('admin.show_admin_kategori')}}"><i class="fa fa-folder"></i> <span class="nav-label">Kategori</span></a>
                </li>

                <li class="{{Request::is('admin/show_admin_blog') ? 'active' : ''}}">
                    <a name ="show_admin_blog" href="{{ route('admin.show_admin_blog')}}"><i class="fa fa-book"></i> <span class="nav-label">Blog</span></a>
                </li>
                <li class="{{Request::is('admin/kontak_us') ? 'active' : ''}}">
                    <a name ="kontak_us" href="{{ route('admin.kontak_us')}}"><i class="fa fa-book"></i> <span class="nav-label">Kotak Masuk</span></a>
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

                <li class="{{Request::is('admin/admin_transaksi') ? 'active' : ''}}">
                    <a name ="admin_transaksi" href="{{route('admin.admin_transaksi')}}"><i class="fa fa-book"></i> <span class="nav-label">Transaksi</span></a>
                </li>

                <li class="{{Request::is('admin.*') ? 'active' : ''}}">
                    <a href="">
                      <i class="fa fa-archive"></i>
                      <span class="nav-label">Pengguna</span>
                      <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                      
                      <li class="{{Request::is('admin.show_admin_afiliate') ? 'active':'' }}">
                        <a href="{{ route('admin.show_admin_afiliate')}}">List Distributor</a>
                      </li>
                      <li><a href="{{ route('admin.show_admin_reseller')}}">List Reseller</a></li>
                    </ul>
                </li>
                <li class="{{Request::is('admin/show_buyer_diskon') ? 'active' : ''}}">
                    <a name ="show_buyer_diskon" href="{{ route('admin.show_buyer_diskon')}}"><i class="fa fa-book"></i> <span class="nav-label">Diskon</span></a>
                </li>


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

            @endif

            @if(Request::is('buyer*'))
                <li class="{{Request::is('buyer/dashboard') ? 'active' : ''}}">
                    <a href="{{route('buyer.dashboard')}}" name="dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li class="{{Request::is('buyer/profile') ? 'active' : ''}}">
                    <a href="{{route('buyer.profile')}}" name="profile"><i class="fa fa-th-large"></i> <span class="nav-label">Profile</span></a>
                </li>
               
            @endif 
          
            {{-- @if(Request::is('customer*'))
                <li class="{{Request::is('customer/dashboard') ? 'active' : ''}}">
                    <a href="{{ route('customer.customer.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
               
            @endif --}}

            {{-- @if(Request::is('reseler*'))
            <li class="{{Request::is('reseler/dashboard') ? 'active' : ''}}">
                <a href="{{ route('reseler.reseler.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Reseler</span></a>
            </li>
            @endif

            @if(Request::is('afiliate*'))
            <li class="{{Request::is('afiliate/dashboard') ? 'active' : ''}}">
                <a href="{{ route('afiliate.afiliate.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards Afiliate</span></a>
            </li>
            @endif --}}
        </ul>

    </div>
</nav>

