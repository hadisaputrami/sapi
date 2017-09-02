@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Investor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($investor, ['route' => ['investors.update', $investor->id], 'method' => 'patch']) !!}

                        @include('investors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection