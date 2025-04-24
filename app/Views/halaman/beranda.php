<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<section id="hero" class="min-vh-100 d-flex pt-2">
    <div class=" container">
        <h1 class="text-uppercase fw-bold display-4">Selamat Datang di Desa Moutong</h1>
        <p class="mt-lg-3 mb-lg-4 ">
            Sistem Informasi Toluwaya hadir untuk temukan semua yang kamu perlukan dalam desa, untuk kegunaan diri sendiri dan orang lain
        </p>
        <a href="#services" class="btn btn-lg btn-success">
            Cari Disini
            <i class="bi bi-chevron-down ms-2"></i>
        </a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 w-100">
        <path fill="#f8f9fa" fill-opacity="1" d="M0,192L48,176C96,160,192,128,288,117.3C384,107,480,117,576,138.7C672,160,768,192,864,197.3C960,203,1056,181,1152,181.3C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</section>
<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <h1 class="text-center text-success">Layanan Kami</h1>
        <p class="text-center">Sistem Informasi Toluwaya hadir untuk menjadi solusi bagi kalian</p>
        <hr>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col">
                <a href="#berita" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow">
                        <img src="img/informasi.jpg" class="card-img-top img-fluid" alt="Informasi Kegiatan Desa">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark">Informasi Kegiatan Desa</h5>
                            <p class="card-text text-dark">Cari tahu tentang semua informasi yang ada di desamu disini, mulai dari kegiatan internal maupun eksternal.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/surat" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow">
                        <img src="img/urussurat.jpg" class="card-img-top img-fluid" alt="Pengurusan Surat">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark">Pengurusan Surat</h5>
                            <p class="card-text text-dark">Sistem Informasi Toluaya menyediakan semua yang berhubungan dengan surat menyurat.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/statistik" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow">
                        <img src="img/datapenduduk.jpg" class="card-img-top img-fluid" alt="Data Kependudukan">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark">Data Kependudukan</h5>
                            <p class="card-text text-dark">Cari tahu tentang semua informasi yang ada di desamu disini, mulai dari kegiatan internal maupun eksternal.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Services Section -->

<!-- Welcome Message -->


<!-- End Welcome Message -->



<?= $this->endSection(); ?>