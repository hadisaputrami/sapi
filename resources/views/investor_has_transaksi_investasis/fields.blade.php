<!-- Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_investasis_id', 'Transaksi Investasis Id:') !!}
    {!! Form::number('transaksi_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nominal Investasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nominal_investasi', 'Nominal Investasi:') !!}
    {!! Form::text('nominal_investasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Scan Bukti Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scan_bukti_pembayaran', 'Scan Bukti Pembayaran:') !!}
    {!! Form::text('scan_bukti_pembayaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayarans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pembayarans_id', 'Jenis Pembayarans Id:') !!}
    {!! Form::number('jenis_pembayarans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Sapi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_sapi', 'Jumlah Sapi:') !!}
    {!! Form::text('jumlah_sapi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('investorHasTransaksiInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
