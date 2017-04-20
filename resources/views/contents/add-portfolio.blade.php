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

    {{-- rupiah type --}}
    <script>
        
        $('.input-rupiah').keyup(function(){
            var v = formatRupiah($(this).val());
            $(this).val(v);
        })

        /* Fungsi */
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split	= number_string.split(','),
                sisa 	= split[0].length % 3,
                rupiah 	= split[0].substr(0, sisa),
                ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
  
    </script>
@endsection