<table class="table table-responsive" id="investorHasTransaksiInvestasis-table">
    <thead>
        <tr>
            <th>Transaksi Investasis Id</th>
        <th>Nominal Investasi</th>
        <th>Scan Bukti Pembayaran</th>
        <th>Jenis Pembayarans Id</th>
        <th>Jumlah Sapi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($investorHasTransaksiInvestasis as $investorHasTransaksiInvestasi)
        <tr>
            <td>{!! $investorHasTransaksiInvestasi->transaksi_investasis_id !!}</td>
            <td>{!! $investorHasTransaksiInvestasi->nominal_investasi !!}</td>
            <td>{!! $investorHasTransaksiInvestasi->scan_bukti_pembayaran !!}</td>
            <td>{!! $investorHasTransaksiInvestasi->jenis_pembayarans_id !!}</td>
            <td>{!! $investorHasTransaksiInvestasi->jumlah_sapi !!}</td>
            <td>
                {!! Form::open(['route' => ['investorHasTransaksiInvestasis.destroy', $investorHasTransaksiInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('investorHasTransaksiInvestasis.show', [$investorHasTransaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('investorHasTransaksiInvestasis.edit', [$investorHasTransaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>