@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Progres
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($progres, ['route' => ['progres.update', $progres->id], 'method' => 'patch']) !!}

                        @include('progres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection