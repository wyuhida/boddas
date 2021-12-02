@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')
   <!-- Site Overlay -->
   <div class="site-overlay"></div>
   <div class="page-titles-img title-space-lg bg-parallax parallax-overlay mb70" data-jarallax='{"speed": 0.2}'
    style='background-image: url("images/bg14.jpg")'>
    <div class="container">
        <div class="row">
            <div class=" col-md-8 ml-auto mr-auto">
                <h1 class='text-uppercase'>Kontak Kami</h1>

            </div>
        </div>
    </div>
</div><!--page title end-->



    <div class="container pt90 pb50">
        <div class="row">
            <div class="col-md-6 mb40">
                <h4 class="text-uppercase">Alamat</h4>
                <p>
                {{$kontak->address_name}}
                </p>
                <br>
                {{-- <h4 class="text-uppercase">Business hours</h4>
                <p>
                    Monday-Friday: 8am to 6pm<br>
                    Saturday: 10am to 2pm<br>
                    Sunday: Closed</p>
                <br> --}}
                <h4 class="text-uppercase">Email</h4>
                <p>
                    <a href="#">{{$kontak->email}}</a></p>
                <br>
                <h4 class="text-uppercase">Phone</h4>
                <p>
                    <a href="#">{{$kontak->num_phone}}</a></p>
                <br>
            
            </div>
            <div class="col-md-6 pb50">
                <div id="markermap" style="width: 100%;height: 350px;"></div>
            </div>
        </div>
    </div>


@endsection
{{-- AIzaSyAMwVpUj3-oHHW8N21819BhKttOga2Rj2s --}}
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
<script src="{{asset('vendors/js/jquery.gmap.min.js')}}"></script> 
<script>
    // Marker Map
    $(document).ready(function () {
        map = new GMaps({
            scrollwheel: false,
            el: '#markermap',
            lat: 26.981942,
            lng: 75.684486

        });
        map.addMarker({
            lat: 26.981942,
            lng: 75.684486,
            title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<h4>GUNJAN SOFTWARE</h4><p>A Small Web design Studio</p>'
            }
        });
    });
</script> 
@endpush