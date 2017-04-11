@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::open() !!}
    <div class="row" style="margin-top:30px;">

        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('InputName', 'Nama Produk/Proyek/Karya')}}
                {{ Form::text('post_title',null, ['class' => 'form-control', 'placeholder' => 'Nama Produk/Proyek/Karya']) }}
            </div>
            <div class="form-group">
                {{ Form::label('InputCategory', 'Kategori')}}
                {{ Form::select('post_category', [] , null, ['class' => 'form-control', 'placeholder' => 'pilih Kategori']) }}
            </div>
            <hr>

            <div class="form-group">
                {{ Form::label('InputDescription', 'Deskripsi')}}
                {{ Form::textarea('post_title',null, ['class' => 'form-control', 'placeholder' => 'Tuliskan tentang Produk/Proyek/Karya lebih detail']) }}
            </div>
        </div>

        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('InputRangeStart', 'Rentang Harga/Biaya')}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    {{ Form::text('price_start',null, ['class' => 'form-control', 'placeholder' => '100.000']) }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    {{ Form::text('price_finish',null, ['class' => 'form-control', 'placeholder' => '500.000']) }}
                </div>
            </div>
        </div>

        
        <div class="col-md-12">
        <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
{!! Form::close() !!}


