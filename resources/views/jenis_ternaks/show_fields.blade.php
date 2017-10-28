<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jenisTernak->id !!}</p>
</div>

<!-- Nama Jenis Ternaks Field -->
<div class="form-group">
    {!! Form::label('nama_jenis_ternaks', 'Nama Jenis Ternaks:') !!}
    <p>{!! $jenisTernak->nama_jenis_ternaks !!}</p>
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

