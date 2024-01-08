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
                        Admin cuma bisa ganti role yaa!
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
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Role</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Waktu Dibuat</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"></h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($holder as $us): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $us['nama'] ?>
                                </td>
                                <td>
                                    <?= $us['email']; ?>
                                </td>
                                <td>
                                    <?= $us['role']; ?>
                                </td>
                                <td>
                                    <?= $us['date_created']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/updateHolder/') . $us['id']; ?>" class="btn btn-warning"><i
                                            class="ti ti-pencil"></i></a>
                                    <a href="<?= base_url('admin/deleteHolder/') . $us['id']; ?>" class="btn btn-danger"><i
                                            class="ti ti-trash"></i></a>
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