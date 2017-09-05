{{-- Croping Image
<link rel="stylesheet" href="{{ asset('jcrop/css/jquery.Jcrop.min.css') }}" />
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('jcrop/js/jquery.Jcrop.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
--}}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<!-- Users Id Field -->
{!! Form::hidden('users_id',Auth::id(), ['class' => 'form-control','required'=>'required']) !!}
<!-- User Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div> -->
<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin',['laki-laki'=>'laki-laki', 'perempuan'=>'perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Perkawinan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_perkawinan', 'Status Perkawinan:') !!}
    {!! Form::select('status_perkawinan', ['Belum Menikah'=>'Belum Menikah', 'Menikah'=>'Menikah'],null, ['class' => 'form-control']) !!}
    {!! $errors->first('status_perkawinan', '<p class="help-block">:message</p>') !!}
           
</div>

<!-- Pendidikan Terakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir:') !!}
    {!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Agama Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agama_id', 'Agama:') !!}
    {!! Form::select('agama_id', $agamas, null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto',  ['class' => 'form-control']) !!}
                    <br \>
                    <img id="cropfoto" src="{{isset($biodatas->foto)?file_exists( public_path() . '/' . $biodatas->foto)?asset($biodatas->foto):asset('assets/images/surat.png'):asset('assets/images/surat.png')}}" alt="your image"  width="200" height="267"  />
                    {{ Form::hidden('foto', isset($biodatas->foto)?file_exists( public_path() . '/' . $biodatas->foto)?$biodatas->foto:'':'') }}

                    <script type="text/javascript">
                        function readFoto(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#cropfoto').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#foto").change(function(){
                            readFoto(this);
                        });
                    </script>


                    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
                
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
</div>

 <!-- Submit Field -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
