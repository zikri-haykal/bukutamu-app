<div class="container-fluid mt-0">
    <div class="d-flex justify-content-xxl-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-2">Edit User</h5>
                        <p class="mb-0">Edit User. </p>
                        <hr>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $holder['id'] ?>">
                            <div class="mb-3">
                                <label for="user" class="form-label">Nama user</label>
                                <input type="text" name="nama" class="form-control" id="user" aria-describedby="user"
                                    value="<?= $holder['nama']; ?>" readonly>
                                <div id="userHelp" class="form-text">Nama User.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="text" value="<?= $holder['email']; ?>" name="email" class="form-control"
                                    id="email" aria-describedby="email" readonly></input>
                                <div id="emailHelp" class="form-text">email User.</div>
                            </div>
                            <div class="mb-3">
                                <label for="date_created" class="form-label">Tanggal Dibuat</label>
                                <input type="text" name="date_created" class="form-control" id="date_created"
                                    aria-describedby="date_created" value="<?= $holder['date_created']; ?>" readonly>
                                <div id="date_createdHelp" class="form-text">Tanggal Dibuat.</div>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" value="<?= $holder['role']; ?>" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="User">Tamu</option>
                                </select>
                                <div id="role" class="form-text">Ubah role.</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('admin/holder') ?>" class="btn btn-danger">Kembali</a>
                                </div>
                                <div class="col text-md-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>