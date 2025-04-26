<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2>Daftar Pengajuan Surat</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($pengajuan as $p): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['tipe_surat'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <a href="/admin/detail/<?= $p['id_surat'] ?>" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>