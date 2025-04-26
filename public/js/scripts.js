function updateForm() {
        const jenis = document.getElementById("jenisSurat").value;
        const container = document.getElementById("formTambahan");

        let html = "";

        if (jenis === "sktm") {
            html = ``;
        } else if (jenis === "sku") {
            html = `
      <div class="mb-3">
        <label for="namaUsaha" class="form-label">Nama Usaha</label>
        <input type="text" class="form-control" id="namaUsaha" placeholder="Masukkan nama usaha">
      </div>
      <div class="mb-3">
        <label for="lokasiUsaha" class="form-label">Lokasi Usaha</label>
        <input type="text" class="form-control" id="lokasiUsaha" placeholder="Masukkan lokasi usaha(dusun)">
      </div>
    `;
        } else if (jenis === "skd") {
            html = `
      <div class="mb-3">
        <label for="alamatDomisili" class="form-label">Alamat Domisili</label>
        <input type="text" class="form-control" id="alamatDomisili" placeholder="Alamat tempat tinggal saat ini(dusun)">
      </div>
    `;
        } else if (jenis === "skl"){
            html = `
      <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" placeholder="Masukkan lokasi">
      </div>
      <div class="mb-3">
        <label for="luas_tanah" class="form-label">luas tanah</label>
        <input type="number" class="form-control" id="luas_tanah" placeholder="Masukkan luas tanah">
      </div>
      <div class="mb-3">
        <label for="terbilang" class="form-label">terbilang</label>
        <input type="text" class="form-control" id="terbilang" placeholder="Masukkan terbilang dari luas tanah (500 = lima ratus)">
      </div>
    `;
        } else if (jenis === "si") {
            html = `
      <div class="mb-3">
        <label for="nama_acara" class="form-label">Nama Acara</label>
        <input type="text" class="form-control" id="nama_acara" placeholder="Masukan nama acara yang akan diselenggarakan (misalnya: Pengajian, Arisan, Rapat, dll)">
      </div>
      <div class="mb-3">
        <label for="tanggal_acara" class="form-label">Tanggal dan waktu acara</label>
        <input type="datetime-local" class="form-control" id="tanggal_acara" placeholder="Tanggal acara">
      </div>
      <div class="mb-3">
        <label for="lokasi_acara" class="form-label">Lokasi Acara</label>
        <input type="text" class="form-control" id="lokasi_acara" placeholder="dimana acara akan di selenggarakan (contoh: Dusun II ( Dua ) Desa Moutong Kecamatan Tilongkabila Kabupaten Bone Bolango)">
      </div>
    `;
        } else if (jenis === "skk") {
            html = `
      <div class="mb-3">
        <label for="lokasi_meninggal" class="form-label">Lokasi Meninggal</label>
        <input type="text" class="form-control" id="lokasi_meninggal" placeholder="Lokasi meninggal">
      </div>
      <div class="mb-3">
        <label for="tanggal_meniggal" class="form-label">Tanggal dan waktu meninggal</label>
        <input type="datetime-local" class="form-control" id="tanggal_meniggal" placeholder="Tanggal Meninggal">
      </div>
    `;
        } else if (jenis === "skt") {
            html = `
            <div class="mb-3">
                <label for="nama_kantor" class="form-label">Nama Pemilik / Kantor</label>
                <input type="text" class="form-control" id="nama_kantor" placeholder="Masukkan nama pemilik atau kantor">
            </div>
            <div class="mb-3">
                <label for="luas" class="form-label">Luas Tanah (M²)</label>
                <input type="number" class="form-control" id="luas" placeholder="Masukkan luas tanah">
            </div>
            <div class="mb-3">
                <label for="terbilang" class="form-label">Terbilang</label>
                <input type="text" class="form-control" id="terbilang" placeholder="Contoh: Lima Ratus">
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai Perolehan (Rp)</label>
                <input type="number" class="form-control" id="nilai" placeholder="Contoh: 50000000">
            </div>
            <div class="mb-3">
                <label for="batas_utara" class="form-label">Batas Utara</label>
                <input type="text" class="form-control" id="batas_utara" placeholder="Masukkan batas utara">
            </div>
            <div class="mb-3">
                <label for="batas_selatan" class="form-label">Batas Selatan</label>
                <input type="text" class="form-control" id="batas_selatan" placeholder="Masukkan batas selatan">
            </div>
            <div class="mb-3">
                <label for="batas_timur" class="form-label">Batas Timur</label>
                <input type="text" class="form-control" id="batas_timur" placeholder="Masukkan batas timur">
            </div>
            <div class="mb-3">
                <label for="batas_barat" class="form-label">Batas Barat</label>
                <input type="text" class="form-control" id="batas_barat" placeholder="Masukkan batas barat">
            </div>
            `;
        }


        container.innerHTML = html;
    }