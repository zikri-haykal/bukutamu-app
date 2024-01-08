<div class="container-fluid mt-0">
    <div class="d-flex justify-content-xxl-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-2">-</h5>
                        <p class="mb-0">-</p>
                        <hr>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $acara['id']; ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_acara" class="form-label">Nama Acara</label>
                                    <input type="text" name="nama_acara" class="form-control" id="nama_acara"
                                        aria-describedby="nama_acara" placeholder="Masukkan Nama Acara"
                                        value="<?= $acara['nama_acara']; ?>" readonly>
                                    <?= form_error('nama_acara', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat" class="form-label">Tempat</label>
                                    <input type="text" name="tempat" class="form-control" id="tempat"
                                        aria-describedby="tempat" placeholder="Tempat Acara"
                                        value="<?= $acara['tempat']; ?>">
                                    <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        aria-describedby="tanggal" placeholder="Tanggal Acara"
                                        value="<?= $acara['tanggal']; ?>">
                                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="time" name="waktu" class="form-control" id="waktu"
                                        aria-describedby="waktu" placeholder="Waktu Acara"
                                        value="<?= $acara['waktu']; ?>">
                                    <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">status</label>
                                    <select name="status" id="status" value="<?= $acara['status']; ?>"
                                        class="form-control">
                                        <option value="Dibuka">Dibuka</option>
                                        <option value="Ditutup">Ditutup</option>
                                    </select>
                                    <div id="status" class="form-text">Ubah status.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="<?= base_url('admin/acara'); ?>" class="btn btn-secondary">Close</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-2">
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