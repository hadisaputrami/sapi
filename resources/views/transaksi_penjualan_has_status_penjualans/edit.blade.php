@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transaksi Penjualan Has Status Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transaksiPenjualanHasStatusPenjualan, ['route' => ['transaksiPenjualanHasStatusPenjualans.update', $transaksiPenjualanHasStatusPenjualan->id], 'method' => 'patch']) !!}

                        @include('transaksi_penjualan_has_status_penjualans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection