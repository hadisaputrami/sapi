<table class="table table-responsive" id="ternaks-table">
    <thead>
        <tr>
            <th>Kode</th>
        <th>Dob</th>
        <th>Tanggal Masuk</th>
        <th>Peternaks Id</th>
        <th>Jenis Ternaks Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ternaks as $ternak)
        <tr>
            <td>{!! $ternak->kode !!}</td>
            <td>{!! $ternak->dob !!}</td>
            <td>{!! $ternak->tanggal_masuk !!}</td>
            <td>{!! $ternak->peternak->user->name !!}</td>
            <td>{!! $ternak->jenisTernak->jenis_ternak !!}</td>
            <td>
                {!! Form::open(['route' => ['ternaks.destroy', $ternak->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ternaks.show', [$ternak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ternaks.edit', [$ternak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>