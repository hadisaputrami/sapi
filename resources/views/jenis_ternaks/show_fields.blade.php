<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jenisTernak->id !!}</p>
</div>

<!-- Jenis Ternak Field -->
<div class="form-group">
    {!! Form::label('jenis_ternak', 'Jenis Ternak:') !!}
    <p>{!! $jenisTernak->jenis_ternak !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jenisTernak->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jenisTernak->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $jenisTernak->deleted_at !!}</p>
</div>

