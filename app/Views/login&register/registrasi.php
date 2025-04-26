<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
                        <h1 class="text-center mb-4">Halaman Registrasi</h1>

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

                        <form action="/proses_registrasi" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK:</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password:</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Masukkan kembali password" required>
                            </div>

                            <div class="mb-3">
                                <label for="dusun" class="form-label">Sekarang kamu terdaftar di dusun mana?</label>
                                <select name="dusun" id="dusun" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Dusun --</option>
                                    <option value="i">Dusun I</option>
                                    <option value="ii">Dusun II</option>
                                    <option value="iii">Dusun III</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Daftar</button>

                            <p class="text-center mt-3">Sudah punya akun? <a href="/login">Login di sini</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFormFields() {
            const role = document.getElementById('role').value;
            document.querySelectorAll('.user-only').forEach(field => field.classList.toggle('hidden', role !== 'user'));
            document.querySelectorAll('.aparat-only').forEach(field => field.classList.toggle('hidden', role !== 'aparat'));
        }
    </script>
</body>

</html>