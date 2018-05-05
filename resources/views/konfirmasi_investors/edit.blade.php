@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Konfirmasi Investor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($konfirmasiInvestor, ['route' => ['konfirmasiInvestors.update', $konfirmasiInvestor->id], 'method' => 'patch']) !!}

                        @include('konfirmasi_investors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection