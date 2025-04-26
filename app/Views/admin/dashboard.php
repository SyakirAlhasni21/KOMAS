<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <div class="row">
        <!-- Total Pengajuan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengajuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPengajuan ?></div>
                </div>
            </div>
        </div>

        <!-- Total Disetujui -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDisetujui ?></div>
                </div>
            </div>
        </div>

        <!-- Total Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ditolak</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalDitolak ?></div>
                </div>
            </div>
        </div>

        <!-- Total Menunggu Tanda Tangan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Tanda Tangan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalMenungguTTD ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>