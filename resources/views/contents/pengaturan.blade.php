@extends('layouts.app')
@section('title', 'Pengaturan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pengaturan</div>

                <div class="panel-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#profil" aria-controls="profil" role="tab" data-toggle="tab">Profil</a></li>
                            <li role="presentation"><a href="#ubah-password" aria-controls="ubah-password" role="tab" data-toggle="tab">Ubah Password</a></li>
                            <li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Email</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="profil"> 
                                @if($umeta->count() <= 0)
                                    @include('forms.profile')
                                @else
                                    @include('forms.profile-edit')
                                @endif 
                            </div>
                            <div role="tabpanel" class="tab-pane" id="ubah-password"> @include('forms.change-password') </div>
                            <div role="tabpanel" class="tab-pane" id="email">...</div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection


{{-- add js on header --}}
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpibf5sVId4K-7OSMdpzn8sJjRqxbhFP4&libraries=places"></script>

    {{-- Autocomplete Google Map --}}
    <script>
        function initialize() {
            
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection


{{-- add js on footer --}}
@section('js-footer')
    {{--  --}}
    <script>

        function getDataKab(provId){
            //ajax
            $.get('/ajax-kab/' + provId, function(data){

                //if success data

                $('#kab_id').empty();
                $.each(data, function(index, kabupatensObj){
                    $('#kab_id').append('<option value="' +kabupatensObj.id_kab+ '">' +kabupatensObj.nama+ '</option>');
                });

            });
        }
        
        $('#prov_id').on('change', function(e){
            console.log(e);
            var provId = e.target.value;

            getDataKab(provId);
        });
    
        $( document ).ready(function(e) {
            console.log(e);
            var provId = $('#prov_id').val();

            getDataKab(provId);
        });
    </script>
@endsection
