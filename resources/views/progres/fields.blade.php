<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Berat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('berat', 'Berat:') !!}
    {!! Form::number('berat', null, ['class' => 'form-control']) !!}
</div>

<!-- Ternak Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ternak_investasis_id', 'Ternak Investasis Id:') !!}
    {!! Form::number('ternak_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('progres.index') !!}" class="btn btn-default">Cancel</a>
</div>
