{!! Form::open() !!}
    <div class="row">
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
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('InputProvinsi', 'Provinsi')}}
                {{ Form::select('provinsi', [], null, ['class' => 'form-control', 'placeholder' => 'pilih Provinsi']) }}
            </div>
            <div class="form-group">
                {{ Form::label('InputKabKota', 'Kab / Kota')}}
                {{ Form::select('kab-kota', [], null, ['class' => 'form-control', 'placeholder' => 'pilih Kab / Kota']) }}
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
                    {{ Form::text('phone_number',null, ['class' => 'form-control', 'placeholder' => 'Nomor WhatsApp']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('InputPINBB', 'PIN BBM')}}
                {{ Form::text('pin_bbm',null, ['class' => 'form-control', 'placeholder' => 'PIN BBM']) }}
            </div>
        </div>

        
        <div class="col-md-12">
        <hr>
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
{!! Form::close() !!}