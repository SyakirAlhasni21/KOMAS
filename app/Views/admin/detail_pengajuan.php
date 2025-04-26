<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2>Detail Pengajuan Surat</h2>
    <h5>Pesan atau Deskripsi dari Pemohon</h5>
    <div style="border: 1px solid #ccc; padding: 15px; margin-top: 10px; background: #f9f9f9;">
        <?= nl2br(esc($surat['deskripsi'])) ?>
    </div>

    <form action="/admin/approve/<?= $surat['id_surat'] ?>" method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" value="<?= $surat['nama'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label>Jenis Surat</label>
            <input type="text" class="form-control" value="<?= $surat['tipe_surat'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Surat</label>
            <textarea name="isi" class="form-control" rows="5" required><?= old('isi', $surat['isi'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Approve & Update Surat</button>
        <a href="/admin" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>