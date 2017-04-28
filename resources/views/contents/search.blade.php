@extends('layouts.app')
@section('title', 'search')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>

        <div class="col-md-10">
            @include('includes.card-list')

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection


