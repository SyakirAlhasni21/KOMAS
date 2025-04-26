<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Daftar Surat Menunggu Tanda Tangan</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Surat</th>
                            <th>Nomor Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($surat)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada surat yang menunggu tanda tangan.</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1;
                            foreach ($surat as $s): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($s['nama']) ?></td>
                                    <td><?= esc($s['jenis_surat']) ?></td>
                                    <td><?= esc($s['nomor_surat']) ?></td>
                                    <td>
                                        <form action="/kepala-desa/tanda-tangan/<?= $s['id'] ?>" method="post">
                                            <button type="submit" class="btn btn-success btn-sm">Tanda Tangan</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>