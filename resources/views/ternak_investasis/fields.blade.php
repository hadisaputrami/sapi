<!-- Ternaks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ternaks_id', 'Ternaks Id:') !!}
    {!! Form::number('ternaks_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaksi Investasis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_investasis_id', 'Transaksi Investasis Id:') !!}
    {!! Form::number('transaksi_investasis_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ternakInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
