{{-- Croping Image
<link rel="stylesheet" href="{{ asset('jcrop/css/jquery.Jcrop.min.css') }}" />
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('jcrop/js/jquery.Jcrop.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
--}}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- User Id Field -->
{!! Form::hidden('user_id', Auth::id(), ['class' => 'form-control']) !!}

<!-- Nama Field -->
<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    {!! Form::label('nama', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Jenis Field -->
<div class="form-group {{ $errors->has('jenis') ? 'has-error' : ''}}">
    {!! Form::label('jenis', 'Jenis', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('jenis',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('jenis', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Kontak Field -->
<div class="form-group {{ $errors->has('kontak') ? 'has-error' : ''}}">
    {!! Form::label('kontak', 'Kontak', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('kontak',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('kontak', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Alamat Field -->
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('alamat',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Npwp Usaha Field -->
<div class="form-group {{ $errors->has('npwp_usaha') ? 'has-error' : ''}}">
    {!! Form::label('npwp_usaha', 'Npwp Usaha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('npwp_usaha',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('npwp_usaha', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Scan Npwp Field -->
<div class="form-group {{ $errors->has('scan_npwp') ? 'has-error' : ''}}">
    {!! Form::label('scan_npwp', 'Scan Npwp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('scan_npwp',null, ['class' => 'form-control']) !!}

        <br>

        <img id="cropnpwp" src="{{isset($dataUsahas->scan_npwp)?file_exists( public_path() . '/' . $dataUsahas->scan_npwp)?asset($dataUsahas->scan_npwp):asset('assets/images/id_card.png'):asset('assets/images/id_card.png')}}" alt="your image"  width="221" height="350"  />
        {{ Form::hidden('scan_npwp', isset($dataUsahas->scan_npwp)?file_exists( public_path() . '/' . $dataUsahas->scan_npwp)?$dataUsahas->scan_npwp:'':'') }}<br>

        <script type="text/javascript">
            function readNPWP(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#cropnpwp').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#scan_npwp").change(function(){
                readNPWP(this);
            });
        </script>

        {!! $errors->first('scan_npwp', '<p class="help-block">:message</p>') !!}<br>
    </div>
</div>

<!-- Nomor Siup Field -->
<div class="form-group {{ $errors->has('nomor_siup') ? 'has-error' : ''}}">
    {!! Form::label('nomor_siup', 'Nomor SIUP', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor_siup',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('nomor_siup', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Scan Siup Field -->
<div class="form-group {{ $errors->has('scan_siup') ? 'has-error' : ''}}">
    {!! Form::label('scan_siup', 'Scan SIUP', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('scan_siup',null, ['class' => 'form-control']) !!}

        <br>

        <img id="cropsiup" src="{{isset($dataUsahas->scan_siup)?file_exists( public_path() . '/' . $dataUsahas->scan_siup)?asset($dataUsahas->scan_siup):asset('assets/images/surat.png'):asset('assets/images/surat.png')}}" alt="your image"  width="221" height="350"  />
        {{ Form::hidden('scan_siup', isset($dataUsahas->scan_siup)?file_exists( public_path() . '/' . $dataUsahas->scan_siup)?$dataUsahas->scan_siup:'':'') }}<br><br>

        <script type="text/javascript">
            function readSIUP(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#cropsiup').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#scan_siup").change(function(){
                readSIUP(this);
            });
        </script>

        {!! $errors->first('scan_siup', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Nomor Situ Field -->
<div class="form-group {{ $errors->has('nik') ? 'has-error' : ''}}">
    {!! Form::label('nomor_situ', 'Nomor SITU', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor_situ',null, ['class' => 'form-control','required'=>'required']) !!}<br>
        {!! $errors->first('nomor_situ', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- Scan Situ Field -->
<div class="form-group {{ $errors->has('scan_situ') ? 'has-error' : ''}}">
    {!! Form::label('scan_situ', 'Scan SITU', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('scan_situ',null, ['class' => 'form-control']) !!}

        <br>

        <img id="cropsitu" src="{{isset($dataUsahas->scan_situ)?file_exists( public_path() . '/' . $dataUsahas->scan_situ)?asset($dataUsahas->scan_situ):asset('assets/images/surat.png'):asset('assets/images/surat.png')}}" alt="your image"  width="221" height="350"  />
        {{ Form::hidden('scan_situ', isset($dataUsahas->scan_situ)?file_exists( public_path() . '/' . $dataUsahas->scan_situ)?$dataUsahas->scan_situ:'':'') }}<br>

        <script type="text/javascript">
            function readSITU(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#cropsitu').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#scan_situ").change(function(){
                readSITU(this);
            });
        </script>

        {!! $errors->first('scan_situ', '<p class="help-block">:message</p>') !!} <br>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('dataUsahas.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>