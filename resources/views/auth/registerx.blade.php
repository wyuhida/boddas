@extends('layouts.app')

@push('css')
  
@endpush

@section('content')
        <div class="middle-box text-center loginscreen   animated fadeInDown">
            <div>
                <div>
                   
                </div>
                <h3>Daftar Akun</h3>
               
                <form class="m-t" role="form" action="{{ route('registers') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" 
                            name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" placeholder="Nama Lengkap" autofocus>

                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control
                             @error('email') is-invalid @enderror" 
                             name="email" value="{{ old('email') }}" required 
                             placeholder="email"
                             autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input id="phone_number" type="number" 
                        class="form-control @error('phone_number')
                         is-invalid @enderror" name="phone_number" 
                         value="{{ old('email') }}" required 
                         placeholder="Nomor Handphone"
                         autocomplete="phone_number">

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                
                    </div>

                    <div class="form-group">                       
                            <select name="id_buyer" class="form-control @error('password') is-invalid @enderror">
                                <option value="1">--OPTIONAL--</option>
                                <option value="2">Reseler</option>
                                <option value="3">Afiliate</option>
                            </select>
                            @error('id_buyer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>

                    <div class="form-group">
                            <input id="password" type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            placeholder="Password"
                            required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>

                    <div class="form-group">
                        
                            <input id="password-confirm" type="password" 
                            class="form-control" name="password_confirmation"
                            placeholder="Konfirmasi Password" 
                            required autocomplete="new-password">
                     
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Daftar</button>
                    <p class="text-muted text-center"><small>sudah punya akun?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="{{route('backend.login')}}">Login</a>
                    
                </form>
            </div>
        </div>
    
        <!-- Mainly scripts -->
        <script src={{ asset('vendors/js/jquery-3.1.1.min.js')}}></script>
        <script src={{ asset('vendors/js/bootstrap.min.js')}}></script>
        <!-- iCheck -->
        <script src={{ asset('vendors/js/plugins/iCheck/icheck.min.js')}}></script>
        <script>
            $(document).ready(function(){
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
   

@endsection

@push('js')
    
@endpush