<!-- Massa Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('massa_awal', 'Massa Awal:') !!}
    {!! Form::number('massa_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::date('dob', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_masuk', 'Tanggal Masuk:') !!}
    {!! Form::date('tanggal_masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Peternaks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peternaks_id', 'Peternaks Id:') !!}
    {!! Form::number('peternaks_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Ternaks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_ternaks_id', 'Jenis Ternak :') !!}
    {!! Form::select('nama_jenis_ternaks',$jenisTernak, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ternakNonInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
