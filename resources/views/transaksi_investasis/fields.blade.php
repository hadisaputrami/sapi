<!-- Kode Transaksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_transaksi', 'Kode Transaksi:') !!}
    {!! Form::text('kode_transaksi', null, ['class' => 'form-control']) !!}
</div>

<!-- Paket Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paket_investasis_id', 'Paket Investasis Id:') !!}
    {!! Form::select('paket_investasis_id',$paket, null, ['class' => 'form-control']) !!}
</div>

<!-- Asuransis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asuransis_id', 'Asuransis Id:') !!}
    {!! Form::select('asuransis_id',$asuransi, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksiInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
