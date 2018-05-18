@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Konfirmasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusKonfirmasi, ['route' => ['statusKonfirmasis.update', $statusKonfirmasi->id], 'method' => 'patch']) !!}

                        @include('status_konfirmasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection