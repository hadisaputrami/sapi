<table class="table table-responsive" id="transInvesHasStatusInves-table">
    <thead>
        <tr>
            <th>Transaksi Investasis Id</th>
        <th>Status Transaksi Investasis Id</th>
        <th>Users Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transInvesHasStatusInves as $transInvesHasStatusInves)
        <tr>
            <td>{!! $transInvesHasStatusInves->transaksi_investasis_id !!}</td>
            <td>{!! $transInvesHasStatusInves->status_transaksi_investasis_id !!}</td>
            <td>{!! $transInvesHasStatusInves->users_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transInvesHasStatusInves.destroy', $transInvesHasStatusInves->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transInvesHasStatusInves.show', [$transInvesHasStatusInves->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transInvesHasStatusInves.edit', [$transInvesHasStatusInves->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>