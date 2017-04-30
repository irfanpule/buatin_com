@extends('layouts.app')
@section('title', 'buatin')

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}


@section('content')
<div class="flex-center position-ref full-height" style="background-image:url('img/office-gadget.jpg');">
    
    <div class="content">
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title title-style">
                        <b>Selamat Datang di Buatin</b>
                    </div>
                    <div class="title-small title-style m-b-md">
                        Temukan orang yang dapat membuat konsepmu menjadi nyata
                    </div>
                </div>

                <div class="col-md-12">
                    <h3 class="title-style">Anda ingin dibuatkan apa ?</h3>
                    <form class="form-inline">
                        <div class="form-group">
                            {{ Form::select('category', ['pilih']  , null, ['class' => 'form-control input-lg', 'placeholder' => 'pilih Kategori']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('key',null, ['class' => 'form-control input-lg', 'placeholder' => 'Cari']) }}
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="container">

    <div class="row">
        @foreach($posts as $post)    
            <div class="col-sm-4 col-lg-3 col-md-3">
                @include('includes.card-list')
            </div>
        @endforeach

        <div class="col-md-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection


