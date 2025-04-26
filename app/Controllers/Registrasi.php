<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Registrasi extends BaseController
{
    public function index(): string
    {
        return view('login&register/registrasi');
    }

    public function prosesRegistrasi()
    {
        $nik = $this->request->getPost('nik');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        $dusun = $this->request->getPost('dusun'); // ambil dari form

        $errors = [];

        // Validasi NIK
        if (empty($nik)) {
            $errors[] = 'NIK wajib diisi.';
        }

        if (empty($dusun)) {
            $errors[] = 'Dusun wajib dipilih.';
        }

        // Validasi password
        if (empty($password)) {
            $errors[] = 'Password wajib diisi.';
        } elseif ($password !== $confirmPassword) {
            $errors[] = 'Password dan konfirmasi password tidak cocok.';
        }

        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Gunakan model dan cek apakah nik valid di dusun yg dipilih
        $pendudukModel = new \App\Models\PendudukModel();
        $pendudukModel->setTableByDusun($dusun); // ← pakai input dusun

        $penduduk = $pendudukModel->getPendudukByNik($nik);
        if (!$penduduk) {
            return redirect()->back()->withInput()->with('errors', ['NIK tidak ditemukan di dusun ' . strtoupper($dusun)]);
        }

        if (!empty($penduduk['password'])) {
            return redirect()->back()->withInput()->with('errors', ['NIK sudah terdaftar.']);
        }

        // Simpan password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $pendudukModel->update($nik, ['password' => $hashedPassword]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
