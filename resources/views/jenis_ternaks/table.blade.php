<table class="table table-responsive" id="jenisTernaks-table">
    <thead>
        <tr>
            <th>Jenis Ternak</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jenisTernaks as $jenisTernak)
        <tr>
            <td>{!! $jenisTernak->jenis_ternak !!}</td>
            <td>
                {!! Form::open(['route' => ['jenisTernaks.destroy', $jenisTernak->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jenisTernaks.show', [$jenisTernak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jenisTernaks.edit', [$jenisTernak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>