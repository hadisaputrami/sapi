@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Transaksi Investasi
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('status_transaksi_investasis.show_fields')
                    <a href="{!! route('statusTransaksiInvestasis.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
