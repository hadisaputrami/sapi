<table class="table table-responsive" id="ternakNonInvestasis-table">
    <thead>
        <th>Massa Awal</th>
        <th>Ternaks Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ternakNonInvestasis as $ternakNonInvestasi)
        <tr>
            <td>{!! $ternakNonInvestasi->massa_awal !!}</td>
            <td>{!! $ternakNonInvestasi->ternaks_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ternakNonInvestasis.destroy', $ternakNonInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ternakNonInvestasis.show', [$ternakNonInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ternakNonInvestasis.edit', [$ternakNonInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>