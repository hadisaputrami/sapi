@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Transaksi Investasi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'statusTransaksiInvestasis.store']) !!}

                        @include('status_transaksi_investasis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
