<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-2">
                <?= $konten['nama_kantor'] ?>
            </h5>
            <p class="mb-3">
                Alamat:
                <?= $konten['alamat_kantor'] ?> |
                No Telephone:
                <?= $konten['no_hp'] ?> |
                Fax:
                <?= $konten['fax'] ?>
            </p>
            <hr>
            <h6 class="card-title fw-semibold mb-2">
                <h6 class="card-title fw-semibold mb-2">
                    <?= htmlspecialchars(urldecode($nama_acara)); ?>
                </h6>
            </h6>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('tamu/acara') ?>" class="btn btn-primary">Kembali</a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i
                    class="ti ti-plus me-2"></i>Tambah</button>
            <div class="table-responsive mt-3">
                <table class="table text-nowrap mb-3 align-middle" id="bukutamu">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">#</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Acara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Anda</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Instansi</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Alamat</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Paraf</h6>
                            </th>
                            <!-- <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($acara as $us): ?>
                            <?php if ($us['acara'] == $nama_acara): ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>.
                                    </td>
                                    <td>
                                        <?= $us['acara']; ?>
                                    </td>
                                    <td>
                                        <?= $us['nama_tamu']; ?>
                                    </td>
                                    <td>
                                        <?= $us['instansi']; ?>
                                    </td>
                                    <td>
                                        <?= $us['alamat']; ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url('paraf/') . $us['paraf']; ?>" alt="Gambar Paraf"
                                            class="img-thumbnail" style="width:100px;">
                                    </td>
                                    <!-- <td>
                                        <a href="<?= base_url('admin/updateAcara/') . $us['id']; ?>" class="btn btn-warning">
                                            <i class="ti ti-pencil" style="font-size:1.1rem;"></i>
                                        </a>
                                        <a href="<?= base_url('admin/isiAcara/') . $us['id'] . '/' . urlencode($us['nama_acara']); ?>"
                                            class="btn btn-info">
                                            Isi
                                        </a>
                                        <a href="<?= base_url('admin/deleteAcara/') . $us['id']; ?>" class="btn btn-danger">
                                            <i class="ti ti-trash" style="font-size:1.1rem;"></i>
                                        </a>
                                    </td> -->
                                </tr>
                                <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Acara</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('tamu/insertIsiAcara') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" value="<?= $user['email']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="acara" class="form-label">Nama Acara</label>
                            <input type="text" name="acara" class="form-control" id="acara" aria-describedby="acara"
                                value="<?= $nama_acara; ?>" placeholder="Masukkan Nama Acara" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_tamu" class="form-label">Nama Anda</label>
                            <input type="text" name="nama_tamu" class="form-control" id="nama_tamu"
                                aria-describedby="tamu" value="<?= set_value('nama_tamu') ?>"
                                placeholder="Masukkan Nama tamu">
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Instansi</label>
                            <input type="text" name="instansi" class="form-control" id="instansi"
                                aria-describedby="instansi" value="<?= set_value('instansi') ?>"
                                placeholder="Nama instansi">
                            <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat"
                                value="<?= set_value('alamat') ?>" placeholder="Alamat Acara">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="paraf" class="form-label">Paraf</label>
                            <input type="file" name="paraf" class="form-control" id="paraf" aria-describedby="paraf"
                                value="<?= set_value('paraf') ?>" placeholder="Paraf Acara">
                            <?= form_error('paraf', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>