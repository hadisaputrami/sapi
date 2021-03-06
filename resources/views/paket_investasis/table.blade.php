<table class="table table-responsive" id="paketInvestasis-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Harga</th>
        <th>Massa</th>
        <th>Lama Kontrak</th>
        <th>Deskripsi</th>
        <th>Return</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paketInvestasis as $paketInvestasi)
        <tr>
            <td>{!! $paketInvestasi->nama !!}</td>
            <td>{!! $paketInvestasi->harga !!}</td>
            <td>{!! $paketInvestasi->massa !!}</td>
            <td>{!! $paketInvestasi->lama_kontrak !!}</td>
            <td>{!! $paketInvestasi->deskripsi !!}</td>
            <td>{!! $paketInvestasi->return !!}</td>
            <td>
                {!! Form::open(['route' => ['paketInvestasis.destroy', $paketInvestasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paketInvestasis.show', [$paketInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paketInvestasis.edit', [$paketInvestasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>