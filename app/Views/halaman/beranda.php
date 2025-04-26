<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<section id="hero" class="min-vh-100 d-flex pt-2">
    <div class=" container">
        <h1 class="text-uppercase fw-bold display-4">Selamat Datang di Desa Moutong</h1>
        <p class="mt-lg-3 mb-lg-4 ">
            Sistem Informasi Toluwaya hadir untuk temukan semua yang kamu perlukan dalam desa, untuk kegunaan diri sendiri dan orang lain
        </p>
        <a href="#services" class="btn btn-lg btn-brand-costume">
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
        <h1 class="text-center">Layanan Kami</h1>
        <p class="text-center">Sistem Informasi Toluwaya hadir untuk menjadi solusi bagi kalian</p>
        <hr>

        <form method="post" action="/ajukansurat" id="suratForm">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsikan surat tujuan pembuatan surat</label>
                <textarea type="text" class="form-control" id="deskirpsi" placeholder="Contoh: saya ingin membuat surat keterangan KIP"></textarea>
            </div>

            <div class="mb-3">
                <label for="jenisSurat" class="form-label">Jenis Surat</label>
                <select class="form-select" id="jenisSurat" name="jenisSurat" onchange="updateForm()" required>
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="sktm">Surat Keterangan Tidak Mampu</option>
                    <option value="skkb">Surat Keterangan Kelakuan Baik</option>
                    <option value="skd">Surat Keterangan Domisili</option>
                    <option value="skl">Surat Keterangan Lokasi</option>
                    <option value="skk">Surat Keterangan Kematian</option>
                    <option value="sku">Surat Keterangan Usaha</option>
                    <option value="skt">Surat Keterangan Tanah</option>
                    <option value="sk">Surat Keterangan</option>
                    <option value="si">Surat Izin</option>
                </select>
            </div>

            <!-- Kontainer dinamis -->
            <div id="formTambahan"></div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<!-- End Services Section -->

<!-- Welcome Message -->


<!-- End Welcome Message -->



<?= $this->endSection(); ?>