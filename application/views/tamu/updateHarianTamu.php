<div class="container-fluid mt-0">
    <div class="d-flex justify-content-xxl-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-2">Ubah Buku</h5>
                        <p class="mb-0">Ubah buku sesuai dengan tujuan anda. </p>
                        <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $harian['id']; ?>">
                            <input type="hidden" name="email" value="<?= $harian['email']; ?>">
                            <div class="mb-3">
                                <label for="namapengunjung" class="form-label">Nama Pengunjung</label>
                                <input type="text" name="nama_pengunjung" class="form-control" id="namapengunjung"
                                    aria-describedby="namaPengunjung" value="<?= $harian['nama_pengunjung']; ?>">
                                <?= form_error('nama_pengunjung', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="instansi" class="form-label">Instansi</label>
                                <input type="text" name="instansi" class="form-control" id="instansi"
                                    value="<?= $harian['instansi']; ?>">
                                <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="<?= $harian['alamat']; ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control" id="keperluan"
                                    value="<?= $harian['keperluan']; ?>">
                                <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url('paraf/') . $harian['paraf']; ?>" alt="Gambar Paraf"
                                    class="img-thumbnail" style="width:100px;">
                                <label for="paraf" class="form-label">Paraf Digital</label>
                                <input type="file" class="form-control mt-2" id="paraf" name="paraf">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('tamu/harian') ?>" class="btn btn-danger">Kembali</a>
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