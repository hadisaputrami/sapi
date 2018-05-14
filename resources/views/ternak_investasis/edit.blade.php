@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ternak Investasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ternakInvestasi, ['route' => ['ternakInvestasis.update', $ternakInvestasi->id], 'method' => 'patch']) !!}

                        @include('ternak_investasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection