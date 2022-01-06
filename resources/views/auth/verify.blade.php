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

<div class="flex flex-col items-center justify-center bg-gray-300 h-screen select-none ">
    <div class="flex flex-col  bg-white px-4 sm:px-6 md:px-4 lg:px-5 py-4 rounded-sm shadow-2xl w-full max-w-lg  border-l-4 border-bg-tombol">
        <div class="font-Inter border-b-2 border-bg-tombol self-center w-60 text-center p-2  text-gray-600 text-lg">Verifikasi Email</div>
        <div class="mt-10">
            @if (session('resent'))
            <div class="p-2 mt-2 mb-2 text-sm text-white bg-blue-300 rounded-lg" role="alert">
                <span class="font-medium">Link verifikasi sudah kami kirim ke email anda.</span>
            </div>
            @endif
           
                  
                <div class="relative w-full mb-3 text-center">
                    <p class="font-Inter capitalize text-gray-700">Pastikan email anda sudah di verifikasi.</p>
                    <p class="font-Inter capitalize text-gray-700">Jika tidak mendapatkan email tekan kirim ulang atau cek di folder SPAM</p>

                </div>
                    @error('email')
                        <div class="p-2 mt-2 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror   
            <form method="POST" action="{{ route('verification.resend') }}" autocomplete="">
                @csrf        
                <div class="text-center mt-6">
                    <button type="submit" id="signin" class="p-3 rounded-lg bg-bg-tombol outline-none text-white shadow
                     w-32 justify-center focus:bg-bg-tombol hover:bg-bg-tombol">Kirim Ulang</button>
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
