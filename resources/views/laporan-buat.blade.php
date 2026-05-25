<!-- Ganti bagian main content dengan ini -->
<div class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold"><i class="bi bi-plus-circle me-2"></i>Buat Laporan Insiden</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pelaporan</li>
            </ol>
        </nav>
    </div>
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <form>
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Judul Kejadian</label><input type="text"
                        class="form-control" placeholder="Contoh: Tumpahan bahan kimia"></div>
                <div class="col-md-6"><label class="form-label">Lokasi</label><input type="text" class="form-control"
                        placeholder="Gedung/Lab/Ruang"></div>
                <div class="col-md-6"><label class="form-label">Tanggal & Waktu</label><input type="datetime-local"
                        class="form-control" value="2026-04-13T10:30"></div>
                <div class="col-md-6"><label class="form-label">Tingkat Risiko</label><select class="form-select">
                        <option value="rendah">Rendah</option>
                        <option value="sedang" selected>Sedang</option>
                        <option value="tinggi">Tinggi</option>
                    </select></div>
                <div class="col-12"><label class="form-label">Deskripsi Kejadian</label>
                    <textarea class="form-control" rows="4" placeholder="Jelaskan kronologi ..."></textarea>
                </div>
                <div class="col-12"><label class="form-label">Unggah Foto (opsional)</label><input type="file"
                        class="form-control" accept="image/*"></div>
                <div class="col-12 mt-4"><button type="submit" class="btn btn-primary px-5 py-2"><i
                            class="bi bi-send me-2"></i>Kirim Laporan</button></div>
            </div>
        </form>
    </div>
</div>
