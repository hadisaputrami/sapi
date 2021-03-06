<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Massa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('massa', 'Massa:') !!}
    {!! Form::text('massa', null, ['class' => 'form-control']) !!}
</div>

<!-- Lama Kontrak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lama_kontrak', 'Lama Kontrak:') !!}
    {!! Form::text('lama_kontrak', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Return Field -->
<div class="form-group col-sm-6">
    {!! Form::label('return', 'Return:') !!}
    {!! Form::number('return', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paketInvestasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
