<div class="container-fluid">
    <div class="container my-0">
        <div class="p-5 text-center rounded-3 text-primary-emphasis">
            <img src="" alt="">
            <h1 class="display-4 fw-bold">Selamat Datang</h1>
            <p class="col-lg-8 mx-auto fs-5">
                <?= $konten['tentang']; ?>
            </p>
            <div class="d-inline-flex gap-2">
                <a href="<?= base_url('tamu/harian'); ?>"
                    class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill">
                    Harian<i class="ms-2 ti ti-arrow-right"></i>
                </a>
                <a href="<?= base_url('tamu/janji'); ?>" class="btn btn-outline-primary btn-lg px-4 rounded-pill">
                    Janji
                </a>
            </div>
        </div>
    </div>
    <div class="p-5 rounded-3">
        <div class="container-fluid py-1">
            <h1 class="display-6 fw-bold text-center mb-4">Tentang Kami</h1>
            <p class="col-md-12 text-center lead">
                <?= $konten['about']; ?>
            </p>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <p class="h5">Temukan Kami Disini</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6504217723855!2d101.43409777472353!3d0.5256371994692173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac0860e1ad29%3A0x75cca9d9aeab2894!2sRumah%20Sakit%20Islam%20Ibnu%20Sina%20Pekanbaru!5e0!3m2!1sen!2sid!4v1704642857779!5m2!1sen!2sid"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6 mx-auto">
                    <p class="h5">Berikan saran anda</p>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('tamu/insertSaran'); ?>" method="post">
                        <input type="hidden" name="email" value="<?= $user['email'] ?>">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="saran" placeholder="Saran" name="isi">
                                <label for="saran">Saran anda</label>
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>