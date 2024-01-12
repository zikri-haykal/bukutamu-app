<div class="container-fluid mt-0">
    <div class="d-flex justify-content-xxl-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-2">Edit Janji</h5>
                        <p class="mb-0">Konfirmasi janji yang dibuat oleh tamumu. </p>
                        <hr>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $janji['id'] ?>">
                            <div class="mb-3">
                                <label for="pengundang" class="form-label">Nama Pengundang</label>
                                <input type="text" name="nama" class="form-control" id="pengundang"
                                    aria-describedby="pengundang" value="<?= $janji['nama']; ?>" readonly>
                                <div id="pengundangHelp" class="form-text">Masukkan Pengundang.</div>
                            </div>
                            <div class="mb-3">
                                <label for="tentang" class="form-label">Tentang</label>
                                <input type="text" value="<?= $janji['tentang']; ?>" name="tentang" class="form-control"
                                    id="tentang" aria-describedby="tentang" readonly></input>
                                <div id="tentangHelp" class="form-text">Tentang Pertemuan.</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Janji</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        aria-describedby="tanggal" value="<?= $janji['tanggal']; ?>" readonly>
                                    <div id="tanggalHelp" class="form-text">Tanggal Acara.</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="waktu" class="form-label">Waktu Janji</label>
                                    <input type="time" name="waktu" class="form-control" id="waktu"
                                        aria-describedby="waktu" value="<?= $janji['waktu']; ?>" readonly>
                                    <div id="waktuHelp" class="form-text">Waktu Acara.</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Menunggu Konfirmasi" <?= ($janji['status'] == 'Menunggu Konfirmasi') ? 'selected' : ''; ?>>
                                            Menunggu Konfirmasi</option>
                                        <option value="Diterima" <?= ($janji['status'] == 'Diterima') ? 'selected' : ''; ?>>Diterima</option>
                                        <option value="Selesai" <?= ($janji['status'] == 'Selesai') ? 'selected' : ''; ?>>
                                            Selesai</option>
                                    </select>
                                    <div id="status" class="form-text">Ubah Status.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('admin/janji') ?>" class="btn btn-danger">Kembali</a>
                                </div>
                                <div class="col text-md-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>