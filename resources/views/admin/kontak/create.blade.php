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
                            <div class="col-lg-offset-2 col-lg-10">
                                <textarea name="address_name" class="summernote" class="form-control" cols="50" rows="50" style="height: 200px;"></textarea>
                            </div>
                        </div>


                        {{-- <div class="form-group">
                            <label class="col-lg-2 control-label">
                                map
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="map" 
                               id="searchmap"
                                class="form-control @error('youtube') is-invalid @enderror"> 
                                <div id="map-canvas"></div>
                                    @error('youtube')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                latitue
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="lat" 
                               id="lat"
                                class="form-control @error('latitute') is-invalid @enderror"> 
                                    @error('latitute')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                longitute
                            </label>
                            <div class="col-lg-10">
                                <input type="text" 
                                name="long" 
                               id="long"
                                class="form-control @error('longitute') is-invalid @enderror"> 
                                    @error('longitute')
                                        <span class="help-block m-b-none" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>                 
                                    @enderror
                            </div>
                        </div> --}}

                       

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
{{-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src={{asset('js/mapInput.js')}}></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
    <script type="text/javascript">

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map-canvas'),{
                    center:{
                        lat:27.72,
                        lng:85.36,
                    },
                    zoom:15
                });

                var marker = new google.maps.Marker({
                    position:{
                        lat:27.72,
                        lng:85.36
                    },
                    map:map,
                    draggable:true
                });

                var searcBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
                google.maps.event.addListener(searcBox,'places_changed', function(){
                    var places = searcBox.getPlaces();
                    var bounds = new google.maps.LatLngBounds();
                    var i, place;
                    for(i=0; place=places[i];i++)
                    {
                        bounds.extend(place.geometry.location);
                        marker.setPosition(place.geometry.location);
                    }
                    map.fitBounds(bounds);
                    map.setZoom(15);
                });
                google.maps.event.addListener(marker,'postition_changed', function(){
                    var lat = marker.getPosition().lat;
                    var lng = marker.getPosition().lng;

                    $('#lat').val(lat);
                    $('#lng').val(lng);
                });
            }
           
    
        
       
    </script>


    
@endpush