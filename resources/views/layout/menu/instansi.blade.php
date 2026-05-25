<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li class="sidebar-item {{ request()->is('instansi') ? 'active' : '' }}">
        <a href="{{ url('instansi') }}" class="sidebar-link rounded-0">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="sidebar-item {{ request()->is('instansi/laporan*') ? 'active' : '' }}">
        <a href="{{ url('instansi/laporan') }}" class="sidebar-link rounded-0">
            <i class="bi bi-file-earmark-text"></i>
            <span>Data Laporan</span>
        </a>
    </li>
</ul>
