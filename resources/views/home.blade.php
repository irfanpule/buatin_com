@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row" style="text-align:center;">
                        <div class="col-xs-12">
                            <img src="{{ asset($posts[0]->user->avatar) }}" class="img-circle avatar-200">
                        </div>
                        <div class="col-xs-12">
                            <h4>{{ title_case($posts[0]->user->display_name) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">
                    Profil
                </div>

                <div class="panel-body">
                    
                    @foreach($posts[0]->user->umetas as $umeta)
                        @if($umeta->meta_key == 'kab-kota')
                            <p><i class="fa fa-map-marker fa-lg icon-padding"></i> {{ $umeta->kab_kota->provinsi->nama }}, {{ $umeta->kab_kota->nama }}  </p>
                        @elseif($umeta->meta_key == 'address')
                            <p><i class="fa"></i> {{ $umeta->meta_value }} </p>
                            <hr>
                        @elseif($umeta->meta_key == 'phone_number')
                            <p><i class="fa fa-mobile fa-lg icon-padding"></i> {{ $umeta->meta_value }} </p>
                        @elseif($umeta->meta_key == 'wa_number')
                            <p><i class="fa fa-whatsapp fa-lg icon-padding"></i> {{ $umeta->meta_value }} </p>
                        @elseif($umeta->meta_key == 'pin_bbm')
                            <p><i class="fa fa-comments fa-lg icon-padding"></i> {{ $umeta->meta_value }} </p>
                        @elseif($umeta->meta_key == 'website')
                            <p><i class="fa fa-mouse-pointer fa-lg icon-padding"></i> {{ $umeta->meta_value }} </p>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Portofolio</div>

                <div class="panel-body">

                    <div class="row">
                        @foreach($posts as $post)    
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                @include('includes.card-list')
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            {{ $posts->links() }}
                        </div>
                    </div>                

                </div>
            </div>
        </div>
    </div>

    

</div>
@endsection
