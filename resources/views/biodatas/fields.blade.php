<!-- Users Id Field -->
    {!! Form::hidden('users_id',Auth::id(), null, ['class' => 'form-control']) !!}

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin',['Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Pendidikan Terakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir:') !!}
    {!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Agama Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agama_id', 'Agama Id:') !!}
    {!! Form::select('agama_id', $agamas,null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
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
