@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ternak
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ternak, ['route' => ['ternaks.update', $ternak->id], 'method' => 'patch']) !!}

                        @include('ternaks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection