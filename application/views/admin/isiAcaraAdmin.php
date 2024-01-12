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
            <a href="<?= base_url('admin/acara') ?>" class="btn btn-primary">Kembali</a>
            <?= $this->session->flashdata('message'); ?>
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
                                <h6 class="fw-semibold mb-0">Nama Tamu</h6>
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