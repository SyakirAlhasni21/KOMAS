<?php

namespace App\Controllers;

use App\Models\SuratModel;
use PhpOffice\PhpWord\TemplateProcessor;

class Admin extends BaseController
{
    protected $suratModel;

    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }

    public function index()
    {
        $totalPengajuan = $this->suratModel->countAll();
        $totalDisetujui = $this->suratModel->where('status', 'Menunggu Tanda Tangan')->countAllResults();
        $totalDitolak = $this->suratModel->where('status', 'Ditolak')->countAllResults();
        $totalMenungguTTD = $this->suratModel->where('status', 'Menunggu Tanda Tangan')->countAllResults();

        return view('admin/dashboard', [
            'totalPengajuan' => $totalPengajuan,
            'totalDisetujui' => $totalDisetujui,
            'totalDitolak' => $totalDitolak,
            'totalMenungguTTD' => $totalMenungguTTD
        ]);
    }
    public function pengajuan()
    {
        $pengajuan = $this->suratModel->findAll();
        $pendudukModel = new \App\Models\PendudukModel();

        foreach ($pengajuan as &$p) {
            $nama = $pendudukModel->cariNamaBerdasarkanNik($p['nik_penduduk']);
            $p['nama'] = $nama ?? 'Nama tidak ditemukan';
        }

        return view('admin/pengajuan', [
            'pengajuan' => $pengajuan
        ]);
    }

    public function detail($id)
    {
        $surat = $this->suratModel->find($id);
        $pendudukModel = new \App\Models\PendudukModel();

        if (!$surat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengajuan tidak ditemukan');
        }

        // Cari Nama Penduduk berdasarkan nik_penduduk
        $nama = $pendudukModel->cariNamaBerdasarkanNik($surat['nik_penduduk']);

        $surat['nama'] = $nama ?? 'Nama tidak ditemukan'; // Tambahkan nama ke array $surat

        return view('admin/detail_pengajuan', [
            'surat' => $surat
        ]);
    }

    public function approve($id)
    {
        $nomorSurat = $this->request->getPost('nomor_surat');
        $isi = $this->request->getPost('isi');
        $date = date('d F Y');

        $surat = $this->suratModel->find($id);
        if (!$surat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengajuan tidak ditemukan');
        }

        $pendudukModel = new \App\Models\PendudukModel();
        $namaPenduduk = $pendudukModel->cariNamaBerdasarkanNik($surat['nik_penduduk']);
        $namaPendudukNoSpace = str_replace(' ', '_', $namaPenduduk);


        // Update database surat
        $this->suratModel->update($id, [
            'status' => 'Diproses'
        ]);

        // Lokasi draft yang sudah diisi penduduk
        $draftPath = WRITEPATH . 'drafts/draft_surat_' . $id . '_' . $namaPendudukNoSpace . '.docx';

        if (!file_exists($draftPath)) {
            log_message('error', 'Draft surat tidak ditemukan: ' . $draftPath);
            return redirect()->back()->with('error', 'Draft surat tidak ditemukan.');
        }

        // Buka draft yang sudah ada
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($draftPath);

        // Tambahkan/isi bagian yang harus diisi admin
        $templateProcessor->setValue('nomor_surat', $nomorSurat);
        $templateProcessor->setValue('isi', $isi);
        $templateProcessor->setValue('date', $date);

        // Simpan sebagai file baru
        $finalDraftPath = WRITEPATH . 'drafts/final_surat_' . $id . '.docx';
        $templateProcessor->saveAs($finalDraftPath);

        // Konversi ke PDF
        $libreOfficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
        $outputDir = WRITEPATH . 'drafts_ttd/';
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $command = $libreOfficePath . ' --headless --convert-to pdf --outdir "' . $outputDir . '" "' . $finalDraftPath . '"';
        exec($command, $output, $result);

        if ($result !== 0) {
            return redirect()->back()->with('error', 'Gagal mengonversi surat ke PDF.');
        }

        // Download hasil PDF
        $pdfPath = $outputDir . 'draft_surat_' . $id . '_' . $namaPenduduk . '.pdf';

        return redirect()->to('/admin')->with('success', 'Surat berhasil disetujui dan siap untuk ditandatangani.');
    }


    public function reject($id)
    {
        $this->suratModel->update($id, [
            'status' => 'Ditolak'
        ]);

        return redirect()->to('/admin')->with('error', 'Surat ditolak.');
    }
}
