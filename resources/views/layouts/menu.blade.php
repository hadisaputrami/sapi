<li class="{{ Request::is('agamas*') ? 'active' : '' }}">
    <a href="{!! route('agamas.index') !!}"><i class="fa fa-edit"></i><span>Agamas</span></a>
</li>

<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('articles.index') !!}"><i class="fa fa-edit"></i><span>Articles</span></a>
</li>

<li class="{{ Request::is('dataUsahas*') ? 'active' : '' }}">
    <a href="{!! route('dataUsahas.index') !!}"><i class="fa fa-edit"></i><span>DataUsahas</span></a>
</li>

<li class="{{ Request::is('investors*') ? 'active' : '' }}">
    <a href="{!! route('investors.index') !!}"><i class="fa fa-edit"></i><span>Investors</span></a>
</li>

<li class="{{ Request::is('investorHasTransaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('investorHasTransaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>InvestorHasTransaksiInvestasis</span></a>
</li>

<li class="{{ Request::is('jenisPembayarans*') ? 'active' : '' }}">
    <a href="{!! route('jenisPembayarans.index') !!}"><i class="fa fa-edit"></i><span>JenisPembayarans</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

<li class="{{ Request::is('paketInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('paketInvestasis.index') !!}"><i class="fa fa-edit"></i><span>PaketInvestasis</span></a>
</li>

<li class="{{ Request::is('peternaks*') ? 'active' : '' }}">
    <a href="{!! route('peternaks.index') !!}"><i class="fa fa-edit"></i><span>Peternaks</span></a>
</li>

<li class="{{ Request::is('progres*') ? 'active' : '' }}">
    <a href="{!! route('progres.index') !!}"><i class="fa fa-edit"></i><span>Progres</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('statusPenjualans*') ? 'active' : '' }}">
    <a href="{!! route('statusPenjualans.index') !!}"><i class="fa fa-edit"></i><span>StatusPenjualans</span></a>
</li>

<li class="{{ Request::is('statusTransaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('statusTransaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>StatusTransaksiInvestasis</span></a>
</li>

<li class="{{ Request::is('transaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('transaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>TransaksiInvestasis</span></a>
</li>

<li class="{{ Request::is('transaksiPenjualans*') ? 'active' : '' }}">
    <a href="{!! route('transaksiPenjualans.index') !!}"><i class="fa fa-edit"></i><span>TransaksiPenjualans</span></a>
</li>

<li class="{{ Request::is('transaksiPenjualanHasStatusPenjualans*') ? 'active' : '' }}">
    <a href="{!! route('transaksiPenjualanHasStatusPenjualans.index') !!}"><i class="fa fa-edit"></i><span>TransaksiPenjualanHasStatusPenjualans</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

