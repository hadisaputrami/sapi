<table class="table table-responsive" id="asuransis-table">
    <thead>
        <tr>
            <th>Premi</th>
        <th>Nomor Polis</th>
        <th>Nama Penjamin</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($asuransis as $asuransi)
        <tr>
            <td>{!! $asuransi->premi !!}</td>
            <td>{!! $asuransi->nomor_polis !!}</td>
            <td>{!! $asuransi->nama_penjamin !!}</td>
            <td>
                {!! Form::open(['route' => ['asuransis.destroy', $asuransi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asuransis.show', [$asuransi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asuransis.edit', [$asuransi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>