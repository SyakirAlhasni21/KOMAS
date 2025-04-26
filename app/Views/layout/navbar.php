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
                    <a class="nav-link fw-bold text-white" href="/">Permintaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white" href="/profile">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white" href="/struktur">FAQ</a>
                </li>

                <!-- Dropdown Profil -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-icon me-1"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>