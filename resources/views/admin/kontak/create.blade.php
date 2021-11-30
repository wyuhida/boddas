@extends('layouts.backend.app')
@section('title','Company')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQLFGeSnYHpHJ8uNYjympPdi1VNFfeQqkw" async defer></script>

@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
              {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span> --}}
             
              <a type="button" href="#" 
              class="btn btn-sm btn-warning pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
              <h2>Tambah Kontak</h2>
             
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('admin.store_admin_kontak')}}" method="POST" 
                    enctype="multipart/form-data">
                        @csrf
                       
                        {{-- <p>Isi Form.</p> --}}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                company name
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="company_name" 
                               
                                class="form-control @error('fullname') is-invalid @enderror"> 
                                    @error('fullname')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                no telp
                            </label>
                            <div class="col-lg-10">
                                <input type="number" 
                                name="no_telp" 
                                
                                class="form-control @error('facebok') is-invalid @enderror"> 
                                    @error('no_telp')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                               email
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="email" 
                                
                                class="form-control @error('email') is-invalid @enderror"> 
                                    @error('email')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                facebook
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="facebook" 
                               
                                class="form-control @error('facebok') is-invalid @enderror"> 
                                    @error('facebook')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                instagram
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="instagram" 
                               
                                class="form-control @error('instagram') is-invalid @enderror"> 
                                    @error('instagram')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                youtube
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="youtube" 
                               
                                class="form-control @error('youtube') is-invalid @enderror"> 
                                    @error('youtube')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                address_name
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="address_name" 
                               
                                class="form-control @error('address_name') is-invalid @enderror"> 
                                    @error('address_name')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}"> --}}
                            <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                            <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude') ?? '0' }}" />
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.shop.fields.address_helper') }}</span>
                        </div>
                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                       


                       
                       

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-md btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script type="text/javascript"
src="http://maps.googleapis.com/maps/api/js?libraries=geocoding">
</script>
<script type="text/javascript"
src="http://maps.googleapis.com/maps/api/js?libraries=javascript_api">
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en&region=GB" async defer></script>

<script src="/js/mapInput.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height:400
        })
});
</script>
@endpush