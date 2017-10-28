<!-- Nama Jenis Ternaks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_jenis_ternaks', 'Nama Jenis Ternaks:') !!}
    {!! Form::text('nama_jenis_ternaks', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jenisTernaks.index') !!}" class="btn btn-default">Cancel</a>
</div>
