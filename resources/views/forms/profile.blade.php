@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row" style="margin-top:30px;">

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputFile">Foto Profil</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Foto Sampul</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
        
        <div class="col-md-6">
            Nama Usaha / Jasa 
            <h3> {{ $user->display_name }} </h3>
        </div>

        <div class="col-md-6">
            Nama Pengguna
            <h3> {{ $user->display_name }} </h3>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        
    </div>

{!! Form::model($umeta,['route'=>'profile', 'id' => Auth::user()->id]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('InputProvinsi', 'Provinsi')}}
                {{ Form::select('provinsi', $prov_lists , null, ['id' => 'prov_id' ,'class' => 'form-control', 'placeholder' => 'pilih Provinsi']) }}
            </div>
            <div class="form-group">
                {{ Form::label('InputKabKota', 'Kab / Kota')}}
                {{ Form::select('kab-kota', [], null, ['id'=>'kab_id' ,'class' => 'form-control', 'placeholder' => 'pilih Kab / Kota']) }}
            </div>
            <div class="form-group">
                {{ Form::label('searchTextField', 'Alamat')}}
                {{ Form::text('address',null, ['class' => 'form-control','id'=>'searchTextField', 'placeholder' => 'Alamat']) }}
            </div>

            <div id="map"></div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('InputPhoneNumber', 'Nomor Telepon')}}
                <div class="input-group">
                    <div class="input-group-addon">+62</div>
                    {{ Form::text('phone_number',null, ['class' => 'form-control', 'placeholder' => 'Nomor Telepon']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('InputWhatsapp', 'WhatsApp')}}
                <div class="input-group">
                    <div class="input-group-addon">+62</div>
                    {{ Form::text('wa_number',null, ['class' => 'form-control', 'placeholder' => 'Nomor WhatsApp']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('InputPINBB', 'PIN BBM')}}
                {{ Form::text('pin_bbm',null, ['class' => 'form-control', 'placeholder' => 'PIN BBM']) }}
            </div>
            <div class="form-group">
                {{ Form::label('InputWebsite', 'Website')}}
                {{ Form::text('website',null, ['class' => 'form-control', 'placeholder' => 'PIN BBM']) }}
            </div>
        </div>

        
        <div class="col-md-12">
        <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
{!! Form::close() !!}