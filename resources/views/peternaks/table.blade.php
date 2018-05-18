<table class="table table-responsive" id="peternaks-table">
    <thead>
        <th>Nama Peternak</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($peternaks as $peternak)
        <tr>
            <td>{!! $peternak->user->name or ""!!}</td>
            <td>
                {!! Form::open(['route' => ['peternaks.destroy', $peternak->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('peternaks.show', [$peternak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('peternaks.edit', [$peternak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>