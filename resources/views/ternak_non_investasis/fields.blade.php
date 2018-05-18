<!-- Massa Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('massa_awal', 'Massa Awal:') !!}
    {!! Form::number('massa_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Ternaks Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ternaks_id', 'Ternaks Id:') !!}
    {!! Form::select('ternaks_id',$ternak, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ternakNonInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
