@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transaksi Penjualan Has Status Penjualan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transaksi_penjualan_has_status_penjualans.show_fields')
                    <a href="{!! route('transPenjHasStatusPenj.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
