<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/authstyle.css') ?>">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container col-lg-8 col-md-10">
        <h1>Login</h1>
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($errors) && count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('warning')): ?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('warning') ?>
            </div>
        <?php endif; ?>
        <!-- Registration Form -->
        <form action="/login" method="post">
            <!-- Fields for Regular Users -->
            <div class="user-only">
                <div class="form-group">
                    <label for="identitas">NIK / Kode Login</label>
                    <input type="text" name="identitas" id="identitas" class="form-control" placeholder="Masukkan NIK atau Kode Login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
        <p class="text-center mt-3">
            Belum punya akun? <a href="/registrasi">Daftar di sini sebagai penduduk</a> atau <a href="/registrasi-aparat">Daftar di sini sebagai admin</a>
        </p>
    </div>

    <!-- Bootstrap JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>