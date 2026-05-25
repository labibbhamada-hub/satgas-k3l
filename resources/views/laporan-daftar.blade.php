<div class="p-4">
    <h3 class="fw-semibold mb-3"><i class="bi bi-table me-2"></i>Daftar Laporan Insiden</h3>
    <!-- Search & Filter -->
    <div class="row g-3 mb-4">
        <div class="col-md-5"><input type="text" class="form-control" placeholder="Cari judul atau lokasi..."></div>
        <div class="col-md-3"><select class="form-select">
                <option>Semua Status</option>
                <option>Baru</option>
                <option>Proses</option>
                <option>Selesai</option>
            </select></div>
        <div class="col-md-2"><button class="btn btn-outline-primary w-100"><i class="bi bi-funnel"></i> Filter</button>
        </div>
    </div>
    <div class="card border-0 shadow-sm rounded-4 p-2">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tumpahan Asam Sulfat</td>
                        <td>Lab. Kimia Dasar</td>
                        <td><span class="badge bg-danger">Tinggi</span></td>
                        <td>13 Apr 2026</td>
                        <td><a href="laporan-detail.html" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>Kabel Listrik Terkelupas</td>
                        <td>Gedung F Lantai 2</td>
                        <td><span class="badge bg-warning text-dark">Proses</span></td>
                        <td>12 Apr 2026</td>
                        <td><a href="laporan-detail.html" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>Kebocoran Gas</td>
                        <td>Lab. Teknik Mesin</td>
                        <td><span class="badge bg-danger">Tinggi</span></td>
                        <td>10 Apr 2026</td>
                        <td><a href="laporan-detail.html" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>Lantai Licin (tumpahan air)</td>
                        <td>Koridor Perpustakaan</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>8 Apr 2026</td>
                        <td><a href="laporan-detail.html" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>APAR Hilang</td>
                        <td>Gedung Rektorat</td>
                        <td><span class="badge bg-warning text-dark">Proses</span></td>
                        <td>5 Apr 2026</td>
                        <td><a href="laporan-detail.html" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav class="mt-3">
            <ul class="pagination pagination-sm justify-content-end">
                <li class="page-item disabled"><a class="page-link">Prev</a></li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item"><a class="page-link">Next</a></li>
            </ul>
        </nav>
    </div>
</div>