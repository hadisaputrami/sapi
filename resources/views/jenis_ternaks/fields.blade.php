<!-- Jenis Ternak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_ternak', 'Jenis Ternak:') !!}
    {!! Form::text('jenis_ternak', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jenisTernaks.index') !!}" class="btn btn-default">Cancel</a>
</div>
