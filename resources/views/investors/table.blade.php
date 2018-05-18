<table class="table table-responsive" id="investors-table">
    <thead>
        <th>Nama Pemilik Rek</th>
        <th>Nama Bank</th>
        <th>No Rek</th>
        <th>Users Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($investors as $investor)
        <tr>
            <td>{!! $investor->nama_pemilik_rek !!}</td>
            <td>{!! $investor->nama_bank !!}</td>
            <td>{!! $investor->no_rek !!}</td>
            <td>{!! $investor->user->name or ""!!}</td>
            <td>
                {!! Form::open(['route' => ['investors.destroy', $investor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('investors.show', [$investor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('investors.edit', [$investor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>