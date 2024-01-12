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
            <div class="col-md-12">
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="ti ti-info-circle me-2" style="font-size: 1.5em;"></i>
                    <div>
                        Admin, tolong perbarui status pertemuan, ya! Jangan lupa memperbarui informasinya.
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
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
                                <h6 class="fw-semibold mb-0"></h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($janji as $us): ?>
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
                                    <a href="<?= base_url('admin/updateJanji/') . $us['id']; ?>" class="btn btn-warning">
                                        <i class="ti ti-pencil" style="font-size:1.1rem;"></i>
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
</div>