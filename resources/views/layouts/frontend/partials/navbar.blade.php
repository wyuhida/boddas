<nav class="navbar navbar-expand-lg navbar-light">
    <div class="search-inline">
      <form>
        <input
          type="text"
          class="form-control"
          placeholder="Type and hit enter..."
        />
        <button type="submit"><i class="ti-search"></i></button>
        <a href="javascript:void(0)" class="search-close">
          <i class="ti-close"></i>
        </a>
      </form>
    </div>
    <div class="container">
      <button
        class="navbar-toggler navbar-toggler-right"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img src="{{asset('vendors/images/')}}" alt="" />
      </a>
      <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link active custom" style="margin-top: 5px;"
              {{-- data-toggle="dropdown" --}}
              {{-- aria-haspopup="true"
              aria-expanded="false" --}}
              href="{{route('home.index')}}"
            >
              Home
            </a>
          </li>

          <li class="nav-item dropdown dropdown-full-width">
            <a
              class="nav-link"  style="margin-top: 5px;"
              {{-- data-toggle="dropdown"
              href="#"
              aria-haspopup="true"
              aria-expanded="false" --}}
            >
              Produk
            </a>
         
          </li>
          <li class="nav-item">
            <a
              class="nav-link"  style="margin-top: 5px;"
              href={{route('show_blog')}}>
              Blog
            </a>
          </li>

          <li class="nav-item">
            <a
              class="nav-link"  style="margin-top: 5px;"
              {{-- data-toggle="dropdown" --}}
              href="#"
              {{-- aria-haspopup="true"
              aria-expanded="false" --}}
            >
              Tentang Kami
            </a>
          </li>
         
        </ul>
      </div>

      <div class="navbar-right-elements">
        <ul class="list-inline">
          {{-- <li class="list-inline-item">
            <a href="javascript:void(0)" class="search-open">
              <i class="ti-search"></i>
            </a>
          </li> --}}
          <li class="list-inline-item">
            <a href="javascript:void(0)" class="menu-btn">
              <i class="ti-shopping-cart"></i>
              <span class="badge badge-default">3</span>
            </a>
          </li>
        </ul>
      </div>
      <!--right nav icons-->
    </div>
  </nav>