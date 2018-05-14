@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trans Inves Has Status Inves
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('trans_inves_has_status_inves.show_fields')
                    <a href="{!! route('transInvesHasStatusInves.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
