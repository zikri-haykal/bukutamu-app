<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-2">Edit Konten</h5>
            <p class="mb-0">Edit kontenmu disini</p>
            <hr>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $konten['id'] ?>">
                <div class="mb-3">
                    <label for="namakantor" class="form-label">Nama Kantor</label>
                    <input type="text" class="form-control" id="namakantor" name="nama_kantor"
                        value="<?= $konten['nama_kantor']; ?>">
                    <?= form_error('nama_kantor', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="alamatkantor" class="form-label">Alamat Kantor</label>
                    <input type="text" class="form-control" id="alamatkantor" name="alamat_kantor"
                        value="<?= $konten['alamat_kantor']; ?>">
                    <?= form_error('alamat_kantor', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $konten['no_hp']; ?>">
                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="fax" class="form-label">Fax</label>
                    <input type="text" class="form-control" id="fax" name="fax" value="<?= $konten['fax']; ?>">
                    <?= form_error('fax', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="tentang" class="form-label">Konten Hero</label>
                    <textarea class="form-control" id="tentang" name="tentang"><?= $konten['tentang']; ?> </textarea>
                    <div class="form-text">Untuk Hero</div>
                </div>
                <div class="mb-3">
                    <label for="about" class="form-label">Konten Hero</label>
                    <textarea class="form-control" id="about" name="about"><?= $konten['about']; ?> </textarea>
                    <div class="form-text">Untuk About Us</div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="row">
                    <a href="<?= base_url('admin/konten') ?>" class="btn btn-primary mt-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>