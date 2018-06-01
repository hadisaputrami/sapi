<!-- Transaksi Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_penjualans_id', 'Transaksi Penjualans Id:') !!}
    {!! Form::select('transaksi_penjualans_id',$trans, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_penjualans_id', 'Status Penjualans Id:') !!}
    {!! Form::select('status_penjualans_id',$status, null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id',Auth::id(), null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayarans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pembayarans_id', 'Jenis Pembayarans Id:') !!}
    {!! Form::select('jenis_pembayarans_id',$jenis, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transPenjHasStatusPenj.index') !!}" class="btn btn-default">Cancel</a>
</div>
