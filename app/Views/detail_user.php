<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<h2>Detail User, <?= esc($user['name']); ?></h2>

<?= $this->endSection(); ?>