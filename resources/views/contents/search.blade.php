@extends('layouts.app')
@section('title', 'search')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('forms.advanced-search')
        </div>

        <div class="col-md-9">

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
@endsection


