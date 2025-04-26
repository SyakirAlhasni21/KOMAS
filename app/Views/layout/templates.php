<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Desa Toluwaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/css/styles.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <?= $this->include('layout/navbar') ?>
        <!-- End Navbar -->

        <div class="flex-grow-1">
            <?= $this->renderSection('content') ?>
        </div>

        <!-- Footer -->
        <?= $this->include('layout/footer') ?>
    </div>
    <script src="<?= base_url('/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= base_url('js/chartDanaDesa.js'); ?>"></script>
    <script src="<?= base_url('js/chartAgama.js'); ?>"></script>
    <script src="<?= base_url('js/chartPendidikan.js'); ?>"></script>
    <script src="<?= base_url('js/chartDataPenduduk.js'); ?>"></script>
    <script src="<?= base_url('js/chartTenagaKerja.js'); ?>"></script>
    <script src="<?= base_url('js/chartMataPencaharian.js'); ?>"></script>
    <script src="<?= base_url('js/chartBantuan.js'); ?>"></script>
    <script src="<?= base_url('/js/scripts.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>