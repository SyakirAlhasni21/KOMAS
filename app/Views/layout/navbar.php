<nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class=" container">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('/images/logodesa.png') ?>" alt="Logo Desa Toluwaya" class="img-fluid me-2" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3 align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/struktur">Struktur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/statistik">Statistik</a>
                </li>
                <li class="nav-item d-flex gap-3 justify-content-lg-center">
                    <?php if (session()->get('logged_in')): ?>
                        <a class="btn btn-brand btn-sm px-4" href="/pesan"><i class="bi bi-envelope"></i></a>
                        <a class="btn btn-danger btn-sm px-4" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    <?php else: ?>
                        <a href="/login" class="btn btn-success btn-sm px-4">LOGIN</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>