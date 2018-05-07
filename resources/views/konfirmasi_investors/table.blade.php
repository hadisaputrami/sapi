<table class="table table-responsive" id="konfirmasiInvestors-table">
    <thead>
        <tr>
            <th>Status Konfirmasi</th>
        <th>Investors Id</th>
        <th>Bank Pengirim</th>
        <th>Bank Tujuan</th>
        <th>Nominal</th>
        <th>Nama Pengirim</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($konfirmasiInvestors as $konfirmasiInvestor)
        <tr>
            <td>{!! $konfirmasiInvestor->status_konfirmasi !!}</td>
            <td>{!! $konfirmasiInvestor->investors_id !!}</td>
            <td>{!! $konfirmasiInvestor->bank_pengirim !!}</td>
            <td>{!! $konfirmasiInvestor->bank_tujuan !!}</td>
            <td>{!! $konfirmasiInvestor->nominal !!}</td>
            <td>{!! $konfirmasiInvestor->nama_pengirim !!}</td>
            <td>
                {!! Form::open(['route' => ['konfirmasiInvestors.destroy', $konfirmasiInvestor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('konfirmasiInvestors.show', [$konfirmasiInvestor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('konfirmasiInvestors.edit', [$konfirmasiInvestor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>