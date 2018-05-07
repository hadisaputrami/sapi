<!-- Status Konfirmasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_konfirmasi', 'Status Konfirmasi:') !!}
    {!! Form::text('status_konfirmasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Investors Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('investors_id', 'Investors Id:') !!}
    {!! Form::number('investors_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Pengirim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_pengirim', 'Bank Pengirim:') !!}
    {!! Form::text('bank_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Tujuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_tujuan', 'Bank Tujuan:') !!}
    {!! Form::text('bank_tujuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Nominal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal', 'Nominal:') !!}
    {!! Form::number('nominal', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Pengirim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pengirim', 'Nama Pengirim:') !!}
    {!! Form::text('nama_pengirim', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('konfirmasiInvestors.index') !!}" class="btn btn-default">Cancel</a>
</div>
