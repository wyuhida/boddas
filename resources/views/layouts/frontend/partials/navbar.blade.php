<nav class="bg-white shadow-lg dark:bg-gray-800">
    <div class="container py-3 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="
                text-2xl font-bold text-gray-800 
                dark:text-white lg:text-3xl 
                hover:text-gray-700 
                dark:hover:text-gray-300
                " 
                href="{{route('home.index')}}">
                    <img class="rounded px-12 relative" src="{{asset('images/logo2.png')}}" 
                    alt="" srcset="">
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
  
        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div class="items-center md:flex px-14 ">
            <div class="flex flex-col md:flex-row md:mx-6">
                <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('home.index')}}">Home</a>
                <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('show_shop')}}">Product</a>
                <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('show_blog')}}">Blog</a>
                <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('tentang_kami')}}">About</a>
                <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('kontak')}}">Contact Us</a>

            </div>
            @guest
            <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('showRegister')}}">Register</a>
            <a class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-bg-tombol dark:hover:text-bg-tombol md:mx-4 md:my-0" href="{{route('backend.login')}}">Login</a>
            @else
                @if(Auth::user()->id_role == 3)
                    <div x-data="{ dropdownOpen: false }" class="flex justify-center md:block" class="ml-4">
                        <button @click="dropdownOpen = true" class="relative text-gray-700 hover:text-gray-600 dark:hover:text-gray-300 drop" href="#">
                            <img class="w-8 h-8 overflow-hidden border-2 rounded-full inline" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                            <span class="absolute top-0 left-0 p-1 text-xs text-white bg-bg-tombol rounded-full"></span>
                            <p class="inline font-bold">{{auth()->user()->fullname}}</p>
                            <svg class="h-7 w-7 inline text-gray-900" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        {{-- <div x-show="dropdownOpen" @mouseover.away="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div> --}}
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen" class="
                            absolute 
                            flex mt-2
                            bg-white 
                            rounded-md shadow-lg overflow-hidden
                            z-20
                            border
                            border-gray-800
                            flex flex-col
                            " style="width: 10rem;">
                            <a href="{{route('buyer.dashboard')}}" class=" items-center px-4 py-3 
                                border-b w-full
                                border-gray-900 hover:bg-gray-100 ">
                                <p class="text-gray-600 text-sm mx-auto">
                                    <span class="font-bold" href="#">Dashboard</span>
                                </p>
                            </a>
                            <a href="" class=" items-center px-4 py-3 
                                border-b w-full
                                border-gray-900 hover:bg-gray-100 ">
                                <p class="text-gray-600 text-sm mx-auto">
                                    <span class="font-bold" href="{{ route('logout') }}"  
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </span>
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                    @endif
                @endguest
           

            {{-- <div x-show="dropdownOpen" @mouseleave.away="dropdownOpen = false"></div> --}}
        
        </div>
    </div>
  </nav>