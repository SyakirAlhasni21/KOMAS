<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi Aparat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/authstyle.css') ?>">
    <style>
        .form-section {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .form-section legend {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Halaman Registrasi Aparat</h1>

                        <!-- Display flash messages -->
                        <?php if (session()->has('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success">
                                <?= esc(session('success')) ?>
                            </div>
                        <?php endif ?>

                        <form action="/registrasi-aparat" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap:</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan:</label>
                                <select name="jabatan" id="jabatan" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Jabatan --</option>
                                    <option value="admin">Admin</option>
                                    <option value="kepala_desa">Kepala Desa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kode_login" class="form-label">Kode Login:</label>
                                <input type="text" name="kode_login" id="kode_login" class="form-control" placeholder="Masukkan Kode Login (contoh: ADM001)" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password:</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Masukkan kembali Password" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_rahasia">Kode Rahasia</label>
                                <input type="text" class="form-control" id="kode_rahasia" name="kode_rahasia" required placeholder="Masukkan Kode Rahasia">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Daftar</button>

                            <p class="text-center mt-3">
                                Sudah punya akun? <a href="/login">Login di sini</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>