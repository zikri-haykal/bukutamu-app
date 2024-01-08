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
                                    <?= $us['status']; ?>
                                </td>
                                <td>
                                    <?php if ($us['status'] != 'Ditutup'): ?>
                                        <a href="<?= base_url('tamu/isiAcara/') . $us['nama_acara'] ?>" class="btn btn-warning">
                                            <i class="ti ti-pencil" style="font-size:1.1rem;"></i> Isi Acara
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>