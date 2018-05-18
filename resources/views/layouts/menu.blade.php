<li class="{{  Request::is('roles*')||Request::is('permissions*')||Request::is('user_role*')||Request::is('users*') ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-cog"></i> <span>Pengaturan Role & User</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-sun-o"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{!! route('permissions.index') !!}"><i class="fa fa-spinner"></i><span>Permissions</span></a>
        </li>

        <li class="{{ Request::is('user_role*') ? 'active' : '' }}">
            <a href="{!! route('user_role.index') !!}"><i class="fa fa-object-group"></i><span>User Role</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('agamas*') ? 'active' : '' }}">
    <a href="{!! route('agamas.index') !!}"><i class="fa fa-edit"></i><span>Agama</span></a>
</li>

<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('articles.index') !!}"><i class="fa fa-edit"></i><span>Article</span></a>
</li>

<li class="{{ Request::is('asuransis*') ? 'active' : '' }}">
    <a href="{!! route('asuransis.index') !!}"><i class="fa fa-edit"></i><span>Asuransis</span></a>
</li>

<li class="{{ Request::is('biodatas*') ? 'active' : '' }}">
    <a href="{!! route('biodatas.index') !!}"><i class="fa fa-edit"></i><span>Biodata</span></a>
</li>

<li class="{{ Request::is('dataUsahas*') ? 'active' : '' }}">
    <a href="{!! route('dataUsahas.index') !!}"><i class="fa fa-edit"></i><span>Data Usaha</span></a>
</li>

<li class="{{ Request::is('investors*') ? 'active' : '' }}">
    <a href="{!! route('investors.index') !!}"><i class="fa fa-edit"></i><span>Investor</span></a>
</li>

<li class="{{ Request::is('investorHasTransaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('investorHasTransaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Investor Has Transaksi Investasis</span></a>
</li>

<li class="{{ Request::is('jenisPembayarans*') ? 'active' : '' }}">
    <a href="{!! route('jenisPembayarans.index') !!}"><i class="fa fa-edit"></i><span>Jenis Pembayaran</span></a>
</li>

<li class="{{ Request::is('jenisTernaks*') ? 'active' : '' }}">
    <a href="{!! route('jenisTernaks.index') !!}"><i class="fa fa-edit"></i><span>JenisTernaks</span></a>
</li>

<li class="{{ Request::is('konfirmasiInvestors*') ? 'active' : '' }}">
    <a href="{!! route('konfirmasiInvestors.index') !!}"><i class="fa fa-edit"></i><span>Konfirmasi Investors</span></a>
</li>

<li class="{{ Request::is('paketInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('paketInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Paket Investasis</span></a>
</li>

<li class="{{ Request::is('peternaks*') ? 'active' : '' }}">
    <a href="{!! route('peternaks.index') !!}"><i class="fa fa-edit"></i><span>Peternaks</span></a>
</li>

<li class="{{ Request::is('progres*') ? 'active' : '' }}">
    <a href="{!! route('progres.index') !!}"><i class="fa fa-edit"></i><span>Progres</span></a>
</li>

<li class="{{ Request::is('statusKonfirmasis*') ? 'active' : '' }}">
    <a href="{!! route('statusKonfirmasis.index') !!}"><i class="fa fa-edit"></i><span>Status Konfirmasis</span></a>
</li>

<li class="{{ Request::is('statusPenjualans*') ? 'active' : '' }}">
    <a href="{!! route('statusPenjualans.index') !!}"><i class="fa fa-edit"></i><span>Status Penjualans</span></a>
</li>

<li class="{{ Request::is('statusTransaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('statusTransaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Status Transaksi Investasis</span></a>
</li>

<li class="{{ Request::is('ternakInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('ternakInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Ternak Investasis</span></a>
</li>

<li class="{{ Request::is('ternakNonInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('ternakNonInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Ternak Non Investasis</span></a>
</li>

<li class="{{ Request::is('transaksiInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('transaksiInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Investasis</span></a>
</li>

<li class="{{ Request::is('transaksiPenjualans*') ? 'active' : '' }}">
    <a href="{!! route('transaksiPenjualans.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Penjualans</span></a>
</li>

<li class="{{ Request::is('ternaks*') ? 'active' : '' }}">
    <a href="{!! route('ternaks.index') !!}"><i class="fa fa-edit"></i><span>Ternaks</span></a>
</li>

<li class="{{ Request::is('transPenjHasStatusPenj*') ? 'active' : '' }}">
    <a href="{!! route('transPenjHasStatusPenj.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Penjualan Has Status Penjualans</span></a>
</li>

<li class="{{ Request::is('transInvesHasStatusInves*') ? 'active' : '' }}">
    <a href="{!! route('transInvesHasStatusInves.index') !!}"><i class="fa fa-edit"></i><span>Trans Inves Has Status Inves</span></a>
</li>

<li class="{{ Request::is('ternakNonInvestasis*') ? 'active' : '' }}">
    <a href="{!! route('ternakNonInvestasis.index') !!}"><i class="fa fa-edit"></i><span>Ternak Non Investasis</span></a>
</li>

