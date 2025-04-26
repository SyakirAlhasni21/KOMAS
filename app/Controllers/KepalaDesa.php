<?php

namespace App\Controllers;

use App\Models\SuratModel;

class KepalaDesa extends BaseController
{
    protected $suratModel;

    public function __construct()
    {
        $this->suratModel = new SuratModel();
    }

    public function index()
    {
        $surat = $this->suratModel->where('status', 'Menunggu Tanda Tangan')->findAll();

        return view('kepala_desa/surat_perlu_ttd', [
            'surat' => $surat
        ]);
    }

    public function tandaTangan($id)
    {
        $this->suratModel->update($id, [
            'status' => 'Selesai'
        ]);

        return redirect()->to('/kepala-desa')->with('success', 'Surat berhasil ditandatangani.');
    }
}
