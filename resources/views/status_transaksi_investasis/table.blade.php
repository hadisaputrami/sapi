<table class="table table-responsive" id="statusTransaksiInvestasis-table">
    <thead>
        <th>Nama</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($statusTransaksiInvestasis as $statusTransaksiInvestasi)
        <tr>
            <td>{!! $statusTransaksiInvestasi->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['statusTransaksiInvestasis.destroy', $statusTransaksiInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusTransaksiInvestasis.show', [$statusTransaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusTransaksiInvestasis.edit', [$statusTransaksiInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>