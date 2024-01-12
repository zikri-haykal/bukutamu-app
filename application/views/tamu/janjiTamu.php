<?php
function getStatusClass($status)
{
    switch ($status) {
        case 'Menunggu Konfirmasi':
            return 'text-bg-warning';
        case 'Diterima':
            return 'text-bg-primary';
        case 'Selesai':
            return 'text-bg-success';
        default:
            return ''; // Default class jika status tidak sesuai dengan kondisi di atas
    }
}
?>

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
            <div class="row mt-3">
                <div class="col-lg-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i
                            class="ti ti-plus me-2"></i>Tambah</button>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table text-nowrap mb-3 align-middle" id="bukutamu">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">#</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama Pengundang</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tentang Pertemuan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Waktu</h6>
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
                        <?php foreach ($janji as $us): ?>
                            <?php if ($user['email'] == $us['email']) { ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>.
                                    </td>
                                    <td>
                                        <?= $us['nama']; ?>
                                    </td>
                                    <td>
                                        <?= $us['tentang']; ?>
                                    </td>
                                    <td>
                                        <?= $us['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?= $us['waktu']; ?>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill <?= getStatusClass($us['status']); ?>">
                                            <?= $us['status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($us['status'] == 'Menunggu Konfirmasi') { ?>
                                            <a href="<?= base_url('tamu/updateJanji/') . $us['id']; ?>" class="btn btn-warning">
                                                <i class="ti ti-pencil" style="font-size:1.1rem;"></i>
                                            </a>
                                            <a href="<?= base_url('tamu/deleteJanji/') . $us['id']; ?>" class="btn btn-danger">
                                                <i class="ti ti-trash" style="font-size:1.1rem;"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Isi Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('tamu/janji') ?>" method="post">
                <input type="hidden" name="email" value="<?= $user['email']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pengundang" class="form-label">Nama Pengundang</label>
                        <input type="text" name="nama" class="form-control" id="pengundang"
                            aria-describedby="pengundang" value="<?= $user['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang Pertemuan</label>
                        <textarea name="tentang" class="form-control" id="tentang"
                            aria-describedby="tentang"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal"
                                aria-describedby="tanggal">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" name="waktu" class="form-control" id="waktu" aria-describedby="waktu">
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