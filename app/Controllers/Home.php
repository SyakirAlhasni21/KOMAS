<?php

namespace App\Controllers;

use App\Models\PendudukModel;
use App\Models\SuratModel;
use PhpOffice\PhpWord\TemplateProcessor;

class Home extends BaseController
{
    public function index(): string
    {

        //Check if the user is logged in
        if (session()->get('logged_in')) {
            return view('halaman/beranda',);
        } else {
            return view('login&register/login',);
        }
    }

    public function ajukanSurat()
    {
        $suratModel = new SuratModel();
        $pendudukModel = new PendudukModel();
        $dusun = session('dusun');
        $pendudukModel->setTableByDusun($dusun);

        $nik_penduduk = session('nik');

        $penduduk = $pendudukModel->where('nik', $nik_penduduk)->first();

        // Ambil tipe surat
        $tipe_surat_input = $this->request->getPost('jenisSurat');
        $deskripsi = $this->request->getPost('deskripsi');
        // Mapping singkatan ke tipe_surat ENUM di database
        $mappingTipeSurat = [
            'sktm' => 'Surat Keterangan Tidak Mampu',
            'skkb' => 'Surat Keterangan Kelakuan Baik',
            'skd'  => 'Surat Keterangan Domisili',
            'skl'  => 'Surat Keterangan Lokasi',
            'skk'  => 'Surat Keterangan Kematian',
            'sku'  => 'Surat Keterangan Usaha',
            'skt'  => 'Surat Keterangan Tanah',
            'sk'   => 'Surat Keterangan',
            'si'   => 'Surat Izin',
        ];

        // Cek apakah singkatan yang dikirim valid
        if (!isset($mappingTipeSurat[$tipe_surat_input])) {
            return redirect()->back()->with('error', 'Jenis surat tidak valid.');
        }

        // Ambil nama surat sesuai ENUM
        $tipe_surat = $mappingTipeSurat[$tipe_surat_input];

        // Cek apakah sudah ada surat yang sama diajukan
        $existingSurat = $suratModel->where([
            'nik_penduduk' => $nik_penduduk,
            'tipe_surat' => $tipe_surat,
            'status' => 'Menunggu'
        ])->first();

        if ($existingSurat) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan surat yang sama dan masih dalam proses.');
        }

        // Data surat untuk disimpan
        $dataSurat = [
            'nik_penduduk' => $nik_penduduk,
            'tipe_surat' => $tipe_surat,
            'status' => 'Menunggu',
            'tgl_pengajuan' => date('Y-m-d'),
            'deskripsi' => $deskripsi,
        ];
        $jenisKelamin = $penduduk['Jenis Kelamin'] == 'P' ? 'Perempuan' : 'Laki-laki';
        $tanggalLahir = date('d F Y', strtotime($penduduk['Tanggal Lahir']));

        // Simpan data surat
        $suratId = $suratModel->insert($dataSurat);
        if (!$suratId) {
            log_message('error', 'Error inserting surat: ' . implode(', ', $suratModel->errors()));
            return redirect()->back()->with('error', 'Failed to save data.');
        }


        // Generate surat (hanya draft)
        $templateFileName = 'Template' . str_replace(' ', '', $tipe_surat) . '.docx';
        $templatePath = WRITEPATH . "templates/{$templateFileName}";
        log_message('debug', 'Template path: ' . $templatePath);

        if (!file_exists($templatePath)) {
            log_message('error', 'Template file not found: ' . $templatePath);
            return redirect()->back()->with('error', 'Template file is missing.');
        }
        $templateProcessor = new TemplateProcessor($templatePath);


        $templateProcessor->setValue('nama', $penduduk['Nama Lengkap']);
        $templateProcessor->setValue('tempat_lahir', $penduduk['Tempat Lahir']);
        $templateProcessor->setValue('tanggal_lahir', $tanggalLahir);
        $templateProcessor->setValue('jenis_kelamin', $jenisKelamin);
        $templateProcessor->setValue('pekerjaan', $penduduk['Pekerjaan']);
        $templateProcessor->setValue('agama', $penduduk['Agama']);
        $templateProcessor->setValue('nik', $penduduk['nik']);

        if (!file_exists($templatePath)) {
            log_message('error', 'Template file not found: ' . $templatePath);
            return redirect()->back()->with('error', 'Template file is missing.');
        }
        if (!is_dir(WRITEPATH . 'drafts/')) {
            mkdir(WRITEPATH . 'drafts/', 0777, true);
        }
        // Simpan file surat sementara
        $namaPenduduk = preg_replace('/[^A-Za-z0-9]/', '_', $penduduk['Nama Lengkap']);
        $fileName = 'draft_surat_' . $suratId . '_' . $namaPenduduk . '.docx';
        $filePath = WRITEPATH . 'drafts/' . $fileName;
        $templateProcessor->saveAs($filePath);

        return redirect()->to('/pesan')->with('message', 'Surat telah diajukan dan draft sedang dibuat.');
    }
}
