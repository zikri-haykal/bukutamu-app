<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-3">
      <!-- Monthly Earnings -->
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title mb-9 fw-semibold">Jumlah Tamu </h5>
              <h4 class="fw-semibold mb-3">
                <?= $barisBuku; ?>
              </h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/buku') ?>" class="btn btn-info">Kelola</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <!-- Monthly Earnings -->
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title mb-9 fw-semibold">Jumlah Acara </h5>
              <h4 class="fw-semibold mb-3">
                <?= $barisAcara; ?>
              </h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/acara') ?>" class="btn btn-info">Kelola</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <!-- Monthly Earnings -->
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title mb-9 fw-semibold">Jumlah Janji </h5>
              <h4 class="fw-semibold mb-3">
                <?= $barisJanji; ?>
              </h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/janji') ?>" class="btn btn-info">Kelola</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <!-- Monthly Earnings -->
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-8">
              <h5 class="card-title mb-9 fw-semibold">Jumlah User </h5>
              <h4 class="fw-semibold mb-3">
                <?= $barisUser; ?>
              </h4>
            </div>
            <div class="col-4">
              <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/holder') ?>" class="btn btn-info">Kelola</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-3">Buku Tamu Harian</h5>
        <div class="col">
          <a href="<?= base_url('admin/buku') ?>" class="btn btn-primary">Kelola</a>
        </div>
        <div class="table-responsive mt-3">
          <table class="table text-nowrap mb-3 align-middle" id="bukutamu">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama Pengunjung</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Instansi</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Alamat</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Keperluan</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Paraf</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Waktu Diisi</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($harian as $us): ?>
                <tr>
                  <td>
                    <?= $i; ?>.
                  </td>
                  <td>
                    <?= $us['nama_pengunjung']; ?>
                  </td>
                  <td>
                    <?= $us['instansi']; ?>
                  </td>
                  <td>
                    <?= $us['alamat']; ?>
                  </td>
                  <td>
                    <?= $us['keperluan']; ?>
                  </td>
                  <td>
                    <img src="<?= base_url('paraf/') . $us['paraf']; ?>" alt="Gambar Paraf" class="img-thumbnail"
                      style="width:100px;">
                  </td>
                  <td>
                    <?= $us['date_created'] ?>
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