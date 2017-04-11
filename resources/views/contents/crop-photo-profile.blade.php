@extends('layouts.app')
@section('title', 'Crop Photo Profile')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.Jcrop.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Image Cropping </div>
                <div class="panel-body">

                    <img src="{{ asset($photo_url) }}" id="cropbox">

                    {!! Form::open(['route' => 'cropPhotoProfile']) !!}
                    {!! Form::hidden('image', $photo_url) !!}
                    {!! Form::hidden('file_name', $file_name) !!}
                    {!! Form::hidden('x', '', ['id' => 'x'] ) !!}
                    {!! Form::hidden('y', '', ['id' => 'y'] ) !!}
                    {!! Form::hidden('w', '', ['id' => 'w'] ) !!}
                    {!! Form::hidden('h', '', ['id' => 'h'] ) !!}
                    {!! Form::submit('Potong', ['class' => 'btn btn-primary']) !!}
                    
                    <a href="{{ route('settings') }}" class="btn btn-danger">Batal</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="{{ asset('js/jquery.Jcrop.js') }}"></script>

    <script type="text/javascript">
        jQuery(function($){

            $('#cropbox').Jcrop({
                aspectRatio: 1,
                bgOpacity: .2,
                setSelect: [ 60, 70, 540, 330 ],
                boxWidth: 500,
                onSelect: updateCoords
            });

            function updateCoords(c)
            {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            };

        });

    </script>
@endsection