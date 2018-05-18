

<!-- Nama Pemilik Rek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pemilik_rek', 'Nama Pemilik Rek:') !!}
    {!! Form::text('nama_pemilik_rek', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_bank', 'Nama Bank:') !!}
    {!! Form::text('nama_bank', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rek', 'No Rek:') !!}
    {!! Form::text('no_rek', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id', $investors,null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('investors.index') !!}" class="btn btn-default">Cancel</a>
</div>
