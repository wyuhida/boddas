<nav class="navbar navbar-expand-lg navbar-light navbar-transparent bg-faded nav-sticky">
 
    <div class="container">
  
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">
            <img class='logo logo-dark' src="{{asset('vendors/images/logo.png')}}" alt="">
            <img class='logo logo-light hidden-md-down' src="{{asset('vendors/images/logo-light.png')}}" alt="">
        </a>
        <div  id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
              <li class="{{Request::is('/') ? 'nav-item dropdown active':'nav-item dropdown'}}">
                <a
                  class="nav-link custom " style="margin-top: 5px;"
                 
                  href="{{route('home.index')}}"
                >
                  Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('show_shop')}}"
                >
                  Produk
                </a>
              </li>
              <li class="{{Request::is('/blog') ? 'nav-item dropdown active':'nav-item dropdown'}}">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('show_blog')}}"
                >
                  Blog
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('tentang_kami')}}"
                >
                  Tentang Kami
                </a>
              </li>
  
              <li class="nav-item dropdown">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('kontak')}}"
                >
                  Kontak
                </a>
              </li>
              @auth
              <!-- ADMIN -->
                @if(auth()->user()->id_role == 2)
                  <li class="nav-item dropdown active">
                    <a class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" href="#">{{Auth::user()->fullname}}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{route('admin.dashboard')}}" class="dropdown-item">Dashboard</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
      
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
      
                              {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              
                              </div> --}}
      
                        </li>
                    </ul>
                  </li>
                @endif
                <!-- SUPER ADMIN -->
                @if(auth()->user()->id_role == 1)
                  <li class="nav-item dropdown active">
                    <a class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" href="#">{{Auth::user()->fullname}}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{route('superadmin.dashboard')}}" class="dropdown-item">Dashboard</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
      
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
      
                              {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              
                              </div> --}}
      
                        </li>
                    </ul>
                  </li>
                @endif
  
                @if(auth()->user()->id_role == 3)
                <li class="nav-item dropdown active">
                  <a class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false" href="#">{{Auth::user()->fullname}}</a>
                  <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="" class="dropdown-item">Dashboard</a></li>
                      <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
    
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
    
                         
                      </li>
                @endif
  
              
              @else
  
              <li class="nav-item dropdown">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('backend.login')}}"
                >
                  Login
                </a>
              </li>
  
              <li class="nav-item dropdown">
                <a
                  class="nav-link custom" style="margin-top: 5px;"
                 
                  href="{{route('showRegister')}}"
                >
                  Register
                </a>
              </li>
              @endif
            </ul>        
        </div>
        <div class=" navbar-right-elements">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="javascript:void(0)" class=" menu-btn"><i class="ti-shopping-cart"></i> <span class="badge badge-default">3</span></a></li>
            </ul>
        </div><!--right nav icons-->
    </div>
  </nav>