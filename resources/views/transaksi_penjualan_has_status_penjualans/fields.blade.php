<!-- Status Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_penjualans_id', 'Status Penjualans Id:') !!}
    {!! Form::number('status_penjualans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayarans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pembayarans_id', 'Jenis Pembayarans Id:') !!}
    {!! Form::number('jenis_pembayarans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksiPenjualanHasStatusPenjualans.index') !!}" class="btn btn-default">Cancel</a>
</div>
