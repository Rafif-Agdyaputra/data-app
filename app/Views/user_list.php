<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<h2>User List Data</h2>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
    Tambah Data User
</button>

<a class="btn btn-danger" href="<?= base_url('user/logout') ?>">
    Logout
</a>

<form method="get" action="<?= base_url('user'); ?>" class="mt-2">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari data" />
    </div>
</form>

<div class="mt-3">
    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name'] ?></h5>
                        <strong>Email:</strong> <?= $user['email'] ?><br>
                        <button class="btn btn-link p-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetails<?= $user['id'] ?>" aria-expanded="false" aria-controls="collapseDetails<?= $user['id'] ?>">
                            <i class="bi bi-eye"></i> Show Details
                        </button>
                        <div class="collapse" id="collapseDetails<?= $user['id'] ?>">
                            <p class="card-text">
                                <strong>Gender:</strong> <?= $user['gender'] ?><br>
                                <strong>Hobbies:</strong> 
                                <?php 
                                    $hobbyArray = json_decode($user['hobbies'], true); 
                                    echo is_array($hobbyArray) ? implode(', ', $hobbyArray) : '-';
                                ?><br>
                                <strong>Country:</strong> <?= $user['country'] ?><br>
                                <strong>Status:</strong> <?= $user['status'] ? 'Active' : 'Inactive' ?><br>
                            </p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-warning" href="<?= base_url('user/editPage/' . $user['id']) ?>">Edit</a>
                            <form action="<?= base_url('user/delete/' . $user['id']) ?>" method="post" onsubmit="return confirm('Apa yakin ingin menghapus data ini?');">
                                <button type="submit" class="btn btn-danger w-100">Hapus</button>
                            </form>
                            <a class="btn btn-info" href="<?= base_url('user/detail/' . $user['id']) ?>">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div id="userModal" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="userModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User Data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('user/tambah'); ?>" >
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukan nama anda" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan emails anda" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div>
                            <input type="radio" name="gender" value="Male" required /> <b>Laki-laki</b>
                            <input type="radio" name="gender" value="Female" /> <b>Perempuan</b>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hobi</label>
                        <div>
                            <div class="form-check">
                                <input type="checkbox" name="hobbies[]" value="Membaca" class="form-check-input" id="hobbyMembaca">
                                <label class="form-check-label" for="hobbyMembaca">Membaca</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="hobbies[]" value="Jalan-jalan" class="form-check-input" id="hobbyJalan">
                                <label class="form-check-label" for="hobbyJalan">Jalan-jalan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select name="country" class="form-select">
                            <option value="Indonesia">Indonesia</option>
                            <option value="China">China</option>
                            <option value="Japan">Japan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div>
                            <input type="checkbox" name="status" value="1"/> <b>Active</b>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" >Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>