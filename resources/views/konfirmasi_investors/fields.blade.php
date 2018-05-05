<!-- Status Konfirmasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_konfirmasi', 'Status Konfirmasi:') !!}
    {!! Form::select('status_konfirmasi',['Menunggu Konfirmasi'=>'Menunggu Konfirmasi','Sedang Investasi'=>'Sedang Investasi'], null, ['class' => 'form-control']) !!}
</div>

<!-- Investors Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('investors_id', 'Investors Id:') !!}
    {!! Form::number('investors_id', Auth::id(), null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('konfirmasiInvestors.index') !!}" class="btn btn-default">Cancel</a>
</div>
