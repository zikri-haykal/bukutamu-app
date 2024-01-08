<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <h5 class="card-title fw-semibold">Detail Alamat</h5>
                            </div>
                            <a href="<?= base_url('admin/updateKonten') ?>" class="btn btn-primary mb-2">Ubah</a>
                            <ul class="timeline-widget mb-0 position-relative mb-n5">
                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                    <div class="timeline-time text-dark flex-shrink-0 text-end fw-semibold">Nama Kantor
                                    </div>
                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                        <span
                                            class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                    </div>
                                    <div class="timeline-desc fs-3 text-dark mt-n1">
                                        <?= $konten['nama_kantor'] ?>
                                    </div>
                                </li>
                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                    <div class="timeline-time text-dark flex-shrink-0 text-end fw-semibold">Alamat
                                        Kantor
                                    </div>
                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                        <span
                                            class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                    </div>
                                    <div class="timeline-desc fs-3 text-dark mt-n1">
                                        <?= $konten['alamat_kantor'] ?>
                                    </div>
                                </li>
                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                    <div class="timeline-time text-dark flex-shrink-0 text-end fw-semibold">No Handphone
                                    </div>
                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                        <span
                                            class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                    </div>
                                    <div class="timeline-desc fs-3 text-dark mt-n1">
                                        <?= $konten['no_hp']; ?>
                                    </div>
                                </li>
                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                    <div class="timeline-time text-dark flex-shrink-0 text-end fw-semibold">Fax</div>
                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                        <span
                                            class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                    </div>
                                    <div class="timeline-desc fs-3 text-dark mt-n1">
                                        <?= $konten['fax']; ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Landing Page</h5>
                            <h6 class="card-subtitle mt-1 mb-2 text-body-secondary">Hero</h6>
                            <p class="card-text">
                                <?= $konten['tentang'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Landing Page</h5>
                            <h6 class="card-subtitle mt-1 mb-2 text-body-secondary">About Us</h6>
                            <p class="card-text">
                                <?= $konten['about'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="card-title fw-semibold">Saran User</h5>
                <table class="table table-borderless" id="bukutamu">
                    <thead>
                        <th>#</th>
                        <th>Email</th>
                        <th>Saran</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($saran as $us): ?>
                            <tr>
                                <td>
                                    <?= $i; ?>.
                                </td>
                                <td>
                                    <?= $us['email']; ?>
                                </td>
                                <td>
                                    <?= $us['isi']; ?>
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
</div>