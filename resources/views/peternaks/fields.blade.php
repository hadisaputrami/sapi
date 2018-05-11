<!-- Users Id Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>--}}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', isset($peternak)?$peternak->user->name:null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', isset($peternak)?$peternak->user->email:null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::number('kontak', isset($peternak)?$peternak->user->biodata:kontaknull, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Password Konfirmasi:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('peternaks.index') !!}" class="btn btn-default">Cancel</a>
</div>
