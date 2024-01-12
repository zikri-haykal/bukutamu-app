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

            <?= $this->session->flashdata('message'); ?>
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
                                <h6 class="fw-semibold mb-0">Tempat Acara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggal Acara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Waktu Acara</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($acara as $us): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>.
                                </td>
                                <td>
                                    <?= $us['nama_acara']; ?>
                                </td>
                                <td>
                                    <?= $us['tempat']; ?>
                                </td>
                                <td>
                                    <?= $us['tanggal']; ?>
                                </td>
                                <td>
                                    <?= $us['waktu']; ?>
                                </td>
                                <td>
                                    <span
                                        class="badge rounded-pill <?= ($us['status'] == 'Dibuka') ? 'text-bg-primary' : 'text-bg-danger'; ?>">
                                        <?= $us['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/updateAcara/') . $us['id']; ?>" class="btn btn-warning">
                                        <i class="ti ti-pencil" style="font-size:1.1rem;"></i>
                                    </a>
                                    <a href="<?= base_url('admin/isiAcara/') . $us['nama_acara'] ?>" class="btn btn-info">
                                        Isi
                                    </a>
                                    <a href="<?= base_url('admin/deleteAcara/') . $us['id']; ?>" class="btn btn-danger">
                                        <i class="ti ti-trash" style="font-size:1.1rem;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
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
                <form action="<?= base_url('admin/acara') ?>" method="post">
                    <input type="hidden" name="email" value="<?= $user['email']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_acara" class="form-label">Nama Acara</label>
                            <input type="text" name="nama_acara" class="form-control" id="nama_acara"
                                aria-describedby="nama_acara" value="<?= set_value('nama_acara') ?>"
                                placeholder="Masukkan Nama Acara">
                            <?= form_error('nama_acara', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" name="tempat" class="form-control" id="tempat" aria-describedby="tempat"
                                value="<?= set_value('tempat') ?>" placeholder="Tempat Acara">
                            <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                    aria-describedby="tanggal" value="<?= set_value('tanggal') ?>"
                                    placeholder="Tanggal Acara">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu" aria-describedby="waktu"
                                    value="<?= set_value('waktu') ?>" placeholder="Waktu Acara">
                                <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
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