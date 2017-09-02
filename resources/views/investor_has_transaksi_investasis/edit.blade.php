@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Investor Has Transaksi Investasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($investorHasTransaksiInvestasi, ['route' => ['investorHasTransaksiInvestasis.update', $investorHasTransaksiInvestasi->id], 'method' => 'patch']) !!}

                        @include('investor_has_transaksi_investasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection