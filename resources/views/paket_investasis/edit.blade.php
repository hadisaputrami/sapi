@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paket Investasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paketInvestasi, ['route' => ['paketInvestasis.update', $paketInvestasi->id], 'method' => 'patch']) !!}

                        @include('paket_investasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection