<table class="table table-responsive" id="transaksiPenjualanHasStatusPenjualans-table">
    <thead>
        <tr>
            <th>Status Penjualans Id</th>
        <th>Users Id</th>
        <th>Jenis Pembayarans Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transaksiPenjualanHasStatusPenjualans as $transaksiPenjualanHasStatusPenjualan)
        <tr>
            <td>{!! $transaksiPenjualanHasStatusPenjualan->status_penjualans_id !!}</td>
            <td>{!! $transaksiPenjualanHasStatusPenjualan->users_id !!}</td>
            <td>{!! $transaksiPenjualanHasStatusPenjualan->jenis_pembayarans_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transaksiPenjualanHasStatusPenjualans.destroy', $transaksiPenjualanHasStatusPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transPenjHasStatusPenj.show', [$transaksiPenjualanHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transPenjHasStatusPenj.edit', [$transaksiPenjualanHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>