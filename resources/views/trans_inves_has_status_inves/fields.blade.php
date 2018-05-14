<!-- Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_investasis_id', 'Transaksi Investasis Id:') !!}
    {!! Form::number('transaksi_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_transaksi_investasis_id', 'Status Transaksi Investasis Id:') !!}
    {!! Form::number('status_transaksi_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transInvesHasStatusInves.index') !!}" class="btn btn-default">Cancel</a>
</div>
