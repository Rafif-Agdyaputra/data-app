<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<h2>User List Data</h2>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
    Tambah Data User
</button>

<form method="get" action="<?= base_url('user'); ?>" class="mt-2">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari data" />
    </div>
</form>

<table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Country</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['gender'] ?></td>
                <td>
                    <?php 
                        $hobbyArray = json_decode($user['hobbies'], true); 
                        echo is_array($hobbyArray) ? implode(', ', $hobbyArray) : '-';
                    ?>
                </td>
                <td><?= $user['country'] ?></td>
                <td><?= $user['status'] ? 'Active' : 'Inactive' ?></td>
                <td>
                    <form action="<?= base_url('user/delete/' . $user['id']) ?>" method="post" onsubmit="return confirm('Apa yakin ingin menhapus data ini?');" >
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

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