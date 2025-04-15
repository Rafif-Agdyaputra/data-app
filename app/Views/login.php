<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<h2>Halaman Login</h2>

<form method="post" action="<?= base_url('login') ?>">
    <?= csrf_field(); ?>
     
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukan emails anda" required />
    </div>
    <button type="submit" class="btn btn-info" >Login</button>
</form>

<?= $this->endSection(); ?>