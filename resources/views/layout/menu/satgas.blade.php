<ul class="menu">
    <li class="sidebar-title">Menu</li>
    <li class="sidebar-item {{ request()->is('satgas') ? 'active' : '' }}">
        <a href="{{ url('satgas') }}" class="sidebar-link rounded-0">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li
        class="sidebar-item has-sub {{ request()->is('satgas/laporan-nsi*') || request()->is('satgas/laporan-area-kampus*') || request()->is('satgas/laporan-praktik-lainnya*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link rounded-0">
            <i class="bi bi-file-earmark-text"></i>
            <span>Data Laporan</span>
        </a>
        <ul
            class="submenu {{ request()->is('satgas/laporan-nsi*') || request()->is('satgas/laporan-area-kampus*') || request()->is('satgas/laporan-praktik-lainnya*') ? 'active' : '' }}">
            <li class="submenu-item {{ request()->is('satgas/laporan-nsi*') ? 'active' : '' }}">
                <a href="{{ url('satgas/laporan-nsi') }}">Needle Stick Injury (NSI)</a>
            </li>
            <li class="submenu-item {{ request()->is('satgas/laporan-area-kampus*') ? 'active' : '' }}">
                <a href="{{ url('satgas/laporan-area-kampus') }}">Kecelakaan Area Kampus</a>
            </li>
            <li class="submenu-item {{ request()->is('satgas/laporan-praktik-lainnya*') ? 'active' : '' }}">
                <a href="{{ url('satgas/laporan-praktik-lainnya') }}">Kecelakaan Lahan Praktik Lainnya</a>
            </li>
        </ul>
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
