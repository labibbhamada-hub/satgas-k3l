<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li class="sidebar-item {{ request()->is('satgas') ? 'active' : '' }}">
        <a href="{{ url('satgas') }}" class="sidebar-link rounded-0">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="sidebar-item {{ request()->is('satgas/laporan*') ? 'active' : '' }}">
        <a href="{{ url('satgas/laporan') }}" class="sidebar-link rounded-0">
            <i class="bi bi-file-earmark-text"></i>
            <span>Data Laporan</span>
        </a>
    </li>
</ul>
