<table class="table table-responsive" id="progres-table">
    <thead>
        <tr>
            <th>Foto</th>
        <th>Deskripsi</th>
        <th>Berat</th>
        <th>Ternak Investasis Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($progres as $progres)
        <tr>
            <td>{!! $progres->foto !!}</td>
            <td>{!! $progres->deskripsi !!}</td>
            <td>{!! $progres->berat !!}</td>
            <td>{!! $progres->ternakInvestasi->ternak->kode or "" !!}</td>
            <td>
                {!! Form::open(['route' => ['progres.destroy', $progres->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('progres.show', [$progres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('progres.edit', [$progres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>