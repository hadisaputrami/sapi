<!-- Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_investasis_id', 'Transaksi Investasis Id:') !!}
    {!! Form::select('transaksi_investasis_id',$tran, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_transaksi_investasis_id', 'Status Transaksi Investasis Id:') !!}
    {!! Form::select('status_transaksi_investasis_id',$status, null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id',Auth::id(), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transInvesHasStatusInves.index') !!}" class="btn btn-default">Cancel</a>
</div>
