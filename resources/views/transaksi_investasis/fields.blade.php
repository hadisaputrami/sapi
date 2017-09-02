<!-- Kode Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_transaksi', 'Kode Transaksi:') !!}
    {!! Form::text('kode_transaksi', null, ['class' => 'form-control']) !!}
</div>

<!-- Paket Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paket_investasis_id', 'Paket Investasis Id:') !!}
    {!! Form::number('paket_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Asuransi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asuransi', 'Asuransi:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('asuransi', false) !!}
        {!! Form::checkbox('asuransi', '1', null) !!} 1
    </label>
</div>

<!-- Ternak Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ternak_investasis_id', 'Ternak Investasis Id:') !!}
    {!! Form::number('ternak_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Asuransis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asuransis_id', 'Asuransis Id:') !!}
    {!! Form::number('asuransis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksiInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
