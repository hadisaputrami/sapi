<table class="table table-responsive" id="statusKonfirmasis-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusKonfirmasis as $statusKonfirmasi)
        <tr>
            <td>{!! $statusKonfirmasi->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['statusKonfirmasis.destroy', $statusKonfirmasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusKonfirmasis.show', [$statusKonfirmasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusKonfirmasis.edit', [$statusKonfirmasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>