@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Ternak
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jenisTernak, ['route' => ['jenisTernaks.update', $jenisTernak->id], 'method' => 'patch']) !!}

                        @include('jenis_ternaks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection