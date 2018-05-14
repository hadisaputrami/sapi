<table class="table table-responsive" id="ternakInvestasis-table">
    <thead>
        <tr>
            <th>Ternaks Id</th>
        <th>Transaksi Investasis Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ternakInvestasis as $ternakInvestasi)
        <tr>
            <td>{!! $ternakInvestasi->ternaks_id !!}</td>
            <td>{!! $ternakInvestasi->transaksi_investasis_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ternakInvestasis.destroy', $ternakInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ternakInvestasis.show', [$ternakInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ternakInvestasis.edit', [$ternakInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>