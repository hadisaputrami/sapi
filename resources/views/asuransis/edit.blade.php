@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Asuransi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($asuransi, ['route' => ['asuransis.update', $asuransi->id], 'method' => 'patch']) !!}

                        @include('asuransis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection