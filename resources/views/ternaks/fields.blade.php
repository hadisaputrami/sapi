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
    {!! Form::select('peternaks_id', $peternak ,null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Ternaks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_ternaks_id', 'Jenis Ternaks:') !!}
    {!! Form::select('jenis_ternaks_id',$jenisTernak, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ternaks.index') !!}" class="btn btn-default">Cancel</a>
</div>
