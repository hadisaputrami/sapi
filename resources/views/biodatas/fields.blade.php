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
    {!! Form::text('status_perkawinan', null, ['class' => 'form-control']) !!}
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
    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('biodatas.index') !!}" class="btn btn-default">Cancel</a>
</div>
