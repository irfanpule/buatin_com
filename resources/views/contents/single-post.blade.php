@extends('layouts.app')
@section('title', title_case($post->post_title))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{ title_case($post->post_title) }}</h3>
                    <h4>Rp. <span class="rupiah">{{ $post->price_start }}</span> - <span class="rupiah">{{ $post->price_end }}</span> </h4>
                </div>

                <div>
                    @foreach($post->allimages->where('post_id', $post->id) as $img_post)
                        <img src="{{ asset($img_post->image_path) }}" style="width:100%;">
                    @endforeach
                </div>
                
                <div class="panel-body">

                </div>

                
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="{{ asset($post->user->avatar) }}" class="img-circle avatar-50">
                        </div>
                        <div class="col-xs-6">
                            <h4>{{ title_case($post->user->display_name) }}</h4>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @foreach($post->user->umetas as $umeta)
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

                <div class="panel-body">
                    <h4> Deskripsi </h4>
                    <p> {{ $post->post_content }} </p>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection