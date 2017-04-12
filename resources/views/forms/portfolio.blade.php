@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::open(['route'=>'postPortfolio', 'files'=>true]) !!}
    <div class="row" style="margin-top:30px;">

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('InputName', 'Nama Produk/Proyek/Karya')}}
                {{ Form::text('post_title',null, ['class' => 'form-control', 'placeholder' => 'Nama Produk/Proyek/Karya']) }}
            </div>
            <div class="form-group">
                {{ Form::label('InputCategory', 'Kategori')}}
                {{ Form::select('post_category', ['A','B','C'] , null, ['class' => 'form-control', 'placeholder' => 'pilih Kategori']) }}
            </div>
            <hr>

            <div class="form-group">
                {{ Form::label('InputDescription', 'Deskripsi')}}
                {{ Form::textarea('post_content',null, ['class' => 'form-control', 'placeholder' => 'Tuliskan tentang Produk/Proyek/Karya lebih detail']) }}
            </div>
        </div>
 
    </div>

    {{-- photo --}}
    <div class="row">
        @for($i = 1; $i <= 6; $i++)
            <div class="col-md-2 col-xs-6">
                <div class="img-portfolio" no-data="{{$i}}" id="imgUpload{{$i}}"><i class="fa fa-camera fa-3x"></i> foto {{$i}}</div>
                <input type="file" name="image{{$i}}" id="chooseFile{{$i}}" accept="image/gif, image/jpeg, image/png" style="display:none;">

                <label id="imgTumbh{{$i}}" style="display:none;">
                    Default
                    <input type="radio" name="default_image" value="{{$i}}">
                </label>    
            </div>
        @endfor
    </div>

    <div class="row">
        <div class="col-md-12">
        <hr>
            <div class="form-group">
                {{ Form::label('InputRangeStart', 'Rentang Harga/Biaya')}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    {{ Form::text('price_start',null, ['class' => 'form-control', 'id'=>'PriceStart', 'placeholder' => '100.000']) }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    {{ Form::text('price_end',null, ['class' => 'form-control', 'id'=>'PriceEnd', 'placeholder' => '500.000']) }}
                </div>
            </div>
        </div>

        
        <div class="col-md-12">
        <p class="input-rupiah"></p>
        <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
{!! Form::close() !!}


