<div class="container-fluid mt-0">
    <div class="d-flex justify-content-xxl-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-2">Ubah Buku</h5>
                        <p class="mb-0">Ubah buku sesuai dengan tujuan anda. </p>
                        <hr>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $janji['id'] ?>">
                            <div class="mb-3">
                                <label for="pengundang" class="form-label">Nama Pengundang</label>
                                <input type="text" name="nama" class="form-control" id="pengundang"
                                    aria-describedby="pengundang" value="<?= $janji['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="tentang" class="form-label">Tentang</label>
                                <input type="text" value="<?= $janji['tentang']; ?>" name="tentang" class="form-control"
                                    id="tentang" aria-describedby="tentang"></input>
                                <?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Janji</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                                        aria-describedby="tanggal" value="<?= $janji['tanggal']; ?>">
                                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="waktu" class="form-label">Waktu Janji</label>
                                    <input type="time" name="waktu" class="form-control" id="waktu"
                                        aria-describedby="waktu" value="<?= $janji['waktu']; ?>">
                                    <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('tamu/janji') ?>" class="btn btn-danger">Kembali</a>
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