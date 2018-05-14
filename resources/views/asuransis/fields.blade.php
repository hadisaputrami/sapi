<!-- Premi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('premi', 'Premi:') !!}
    {!! Form::number('premi', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Polis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_polis', 'Nomor Polis:') !!}
    {!! Form::text('nomor_polis', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penjamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_penjamin', 'Nama Penjamin:') !!}
    {!! Form::text('nama_penjamin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('asuransis.index') !!}" class="btn btn-default">Cancel</a>
</div>
