<table class="table table-responsive" id="transaksiInvestasis-table">
    <thead>
        <tr>
            <th>Kode Transaksi</th>
        <th>Paket Investasis Id</th>
        <th>Asuransis Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transaksiInvestasis as $transaksiInvestasi)
        <tr>
            <td>{!! $transaksiInvestasi->kode_transaksi !!}</td>
            <td>{!! $transaksiInvestasi->paketInvestasi->nama !!}</td>
            <td>{!! $transaksiInvestasi->asuransi->premi !!}</td>
            <td>
                {!! Form::open(['route' => ['transaksiInvestasis.destroy', $transaksiInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transaksiInvestasis.show', [$transaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transaksiInvestasis.edit', [$transaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>