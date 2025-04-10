<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<h2>Edit User</h2>

<form method="post" action="<?= base_url('user/edit/' . $user['id']) ?>">
    <?= csrf_field(); ?>

    <div class="mb-3" >
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Masukan nama anda" value="<?= old('name', $user['name']) ?>" required />
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukan emails anda" value="<?= old('email', $user['email']) ?>" required />
    </div>
    <div class="mb-3">
        <label class="form-label">Gender</label>
        <div>
            <input type="radio" name="gender" value="Male" <?= ($user['gender']) == 'Male' ? 'checked' : '' ?> required /> <b>Laki-laki</b>
            <input type="radio" name="gender" value="Female" <?= ($user['gender']) == 'Female' ? 'checked' : '' ?> /> <b>Perempuan</b>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Hobi</label>
        <div>
            <?php $hobbiesData = json_decode($user['hobbies'], true) ?>
            <div class="form-check" >
                <input type="checkbox" name="hobbies[]" value="Membaca" class="form-check-input" id="hobbyMembaca" <?= in_array("Membaca", $hobbiesData) ? 'checked' : '' ?> >
                <label class="form-check-label" for="hobbyMembaca">Membaca</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="hobbies[]" value="Jalan-jalan" class="form-check-input" id="hobbyJalan" <?= in_array("Jalan-jalan", $hobbiesData) ? 'checked' : '' ?> >
                <label class="form-check-label" for="hobbyJalan">Jalan-jalan</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Country</label>
        <select name="country" class="form-select">
            <option value="Indonesia" <?= ($user['country']) == 'Indonesia' ? 'selected' : '' ?> >Indonesia</option>
            <option value="China" <?= ($user['country']) == 'China' ? 'selected' : '' ?> >China</option>
            <option value="Japan" <?= ($user['country']) == 'Japan' ? 'selected' : '' ?> >Japan</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <div>
            <input type="checkbox" name="status" value="1" <?= ($user['status']) == 1 ? 'checked' : '' ?>/> <b>Active</b>
        </div>
    </div>
    <button type="submit" class="btn btn-warning" >Edit</button>
</form>

<?= $this->endSection(); ?>