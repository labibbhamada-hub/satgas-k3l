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
    <li class="sidebar-title">Lainnya</li>
    <li class="sidebar-item {{ request()->is('satgas/instansi*') ? 'active' : '' }}">
        <a href="{{ url('satgas/instansi') }}" class="sidebar-link rounded-0">
            <i class="bi bi-building"></i>
            <span>Data Instansi</span>
        </a>
    </li>
    <li class="sidebar-item {{ request()->is('satgas/berita*') ? 'active' : '' }}">
        <a href="{{ url('satgas/berita') }}" class="sidebar-link rounded-0">
            <i class="bi bi-newspaper"></i>
            <span>Data Berita</span>
        </a>
    </li>
    <li class="sidebar-item {{ request()->is('satgas/pelatihan*') ? 'active' : '' }}">
        <a href="{{ url('satgas/pelatihan') }}" class="sidebar-link rounded-0">
            <i class="bi bi-book"></i>
            <span>Data Pelatihan</span>
        </a>
    </li>
</ul>
