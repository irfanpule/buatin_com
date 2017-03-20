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
                            <div role="tabpanel" class="tab-pane active" id="profil"> @include('forms.profile') </div>
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
