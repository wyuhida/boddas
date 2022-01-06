<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Register') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css')
</head>
<body class="bg-gray-300">
    @include('sweetalert::alert')
        <!-- component -->
        {{-- <div class="font-sm self-center text-lg sm:text-lg uppercase w-60 text-center bg-purple-600 shadow-lg p-6 rounded-full text-white">Register</div> --}}

<div class="flex flex-col mt-44 items-center justify-center bg-gray-300 h-screen select-none md:mt-44">
    <div class="flex flex-col  bg-white px-4 sm:px-6 md:px-4 lg:px-5 py-4 rounded-sm shadow-2xl w-full max-w-lg  border-l-4 border-bg-tombol">
        <div class="font-Inter border-b-2 border-bg-tombol self-center w-60 text-center p-2  text-gray-600 text-lg">Daftar Akun</div>
        <div class="mt-10">
            <form method="POST" action="{{route('register_buyer')}}" autocomplete="">
                @csrf
                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Nama Lengkap</p>
                    <input type="text" name="fullname" 
                        class="border-0 p-3 placeholder-gray-400 text-gray-700 
                        bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                        font-Inter
                        @error('fullname') is-invalid @enderror"
                        value="{{ old('fullname') }}" 
                        placeholder="nama lengkap" style="transition: all 0.15s ease 0s;" />
                    {{-- <small class="p-2 text-red-500">* Email</small> --}}
                         @error('fullname')
                            <div class="p-2 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                        @enderror         
                      
                </div>                
                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Email</p>
                    <input type="email" name="email" 
                        class="border-0 p-3 placeholder-gray-400 text-gray-700 
                        bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                        font-Inter
                        @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" 
                         placeholder="email" style="transition: all 0.15s ease 0s;" />
                    {{-- <small class="p-2 text-red-500">* Email</small> --}}
                </div>
                    @error('email')
                        <div class="p-2 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror   

                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Nomor HP / Whatsapp</p>
                    <input type="text" name="phone_number" 
                    class="border-0 p-3 placeholder-gray-400 
                    text-gray-700 bg-white rounded text-sm shadow 
                    focus:outline-none focus:ring w-full
                    font-Inter
                    @error('phone_number') is-invalid @enderror" 
                    value="{{ old('phone_number') }}" 
                    placeholder="Nomor Hp" style="transition: all 0.15s ease 0s;" />
                    {{-- <small class="p-2 text-red-500">* Password</small> --}}
                </div>
                    @error('phone_number')
                        <div class="p-2 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                    
                    <div class="relative w-full mb-3">
                        <p class="font-Inter capitalize text-bg-tombol">Pengguna</p>
                        <select name="id_buyer" class="border-0 p-3 placeholder-gray-400 
                        text-gray-700 bg-white rounded text-sm shadow
                        font-Inter 
                        focus:outline-none focus:ring w-full" id="" style="transition: all 0.15s ease 0s;">
                        @foreach($s_buyer as $buyer)
                            <option class="
                                bg-white focus:outline-none border-0 p-2 text-gray-700 text-sm focus:ring font-Inter" 
                                value="{{$buyer->id}}">{{$buyer->buyer}}</option>
                        @endforeach
                        </select>
                    </div>

                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Alamat Lengkap</p>
                    <textarea name="address_name"
                    class="border-0 p-3 placeholder-gray-400 text-gray-700 
                    bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                    font-Inter
                    @error('address_name') is-invalid @enderror" 
                    placeholder="Alamat Lengkap" style="transition: all 0.15s ease 0s;">{{ old('address_name') }}</textarea>
                    {{-- <small class="p-2 text-red-500">* Password</small> --}}
                </div>
                    @error('address_name')
                    <div class="p-2 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                    @enderror  

                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Password</p>
                    <input type="password" name="password" 
                    class="border-0 p-3 placeholder-gray-400 text-gray-700 
                    bg-white rounded text-sm shadow focus:outline-none focus:ring w-full
                    font-Inter
                    @error('password') is-invalid @enderror" 
                    placeholder="Password" style="transition: all 0.15s ease 0s;" />
                    {{-- <small class="p-2 text-red-500">* Password</small> --}}
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="relative w-full mb-3">
                    <p class="font-Inter capitalize text-bg-tombol">Konfirmasi Password</p>
                    <input type="password" name="password_confirmation" 
                    class="border-0 p-3 placeholder-gray-400 
                    text-gray-700 bg-white rounded text-sm shadow 
                    focus:outline-none focus:ring w-full font-Inter" 
                    placeholder="Konfirmasi Password" 
                    style="transition: all 0.15s ease 0s;" />
                    {{-- <small class="p-2 text-red-500">* Password</small> --}}
                </div>

                <div class="text-center mt-6">
                    <button type="submit" name="signin" 
                        class="p-3 rounded-lg bg-bg-tombol 
                        outline-none text-white shadow w-32 
                        justify-center focus:bg-bg-tombol hover:bg-bg-tombol">
                        Daftar
                    </button>
                </div>  
                <div class="flex flex-wrap mt-6">
                    <div class="w-1/2 text-left">
                        <a href="{{ route('password.request') }}" class="text-blue-900 text-xl"><small>Lupa password?</small></a>
                    </div>
                    <div class="w-1/2 text-right">
                        <a href="{{route('backend.login')}}" class="text-blue-900 text-xl"><small>Sign In</small></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src={{ asset('assets/js/jquery-3.1.1.min.js')}}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
            });
        @endforeach
    @endif
</script>

@stack('js')
</body>
</html>
