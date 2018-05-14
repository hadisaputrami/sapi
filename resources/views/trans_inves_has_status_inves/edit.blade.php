@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trans Inves Has Status Inves
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transInvesHasStatusInves, ['route' => ['transInvesHasStatusInves.update', $transInvesHasStatusInves->id], 'method' => 'patch']) !!}

                        @include('trans_inves_has_status_inves.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection