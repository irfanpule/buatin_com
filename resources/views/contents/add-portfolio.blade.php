@extends('layouts.app')
@section('title', 'Portofolio')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Portofolio</div>

                <div class="panel-body">
                    @include('forms.portfolio')
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-footer')
    {{-- multi upload image post --}}
    <script>
        $('.img-portfolio').mouseover(function(){
            $(this).css('background-color', '#50abde');
        });
        $('.img-portfolio').mouseout(function(){
            $(this).css('background-color', '#3097d1');
        });

        $('.img-portfolio').click(function(){
            id = $(this).attr('id');
            no_data = $(this).attr('no-data');
            console.log(no_data, id);

            $('#chooseFile'+no_data).click();

            $('#chooseFile'+no_data).on('change', function(){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imgUpload"+no_data).css('background-size', 'cover');
                    $("#imgUpload"+no_data+" i").css('opacity', 0.5);
                    $("#imgTumbh"+no_data).css('display', 'block');

                    document.getElementById('imgUpload'+no_data).style.backgroundImage = "url(" + reader.result + ")";
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });
        });
        
    </script>

@endsection