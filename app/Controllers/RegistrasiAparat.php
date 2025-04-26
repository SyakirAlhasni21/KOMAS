<?php

namespace App\Controllers;

use App\Models\AparatModel;

class RegistrasiAparat extends BaseController
{
    public function index()
    {
        return view('login&register/registrasi_aparat');
    }

    public function proses()
    {
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $kode_login = $this->request->getPost('kode_login');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        $kode_rahasia = $this->request->getPost('kode_rahasia');

        $errors = [];

        // Validasi umum...
        if (empty($nama)) {
            $errors[] = 'Nama wajib diisi.';
        }
        if (empty($jabatan)) {
            $errors[] = 'Jabatan wajib dipilih.';
        }
        if (empty($kode_login)) {
            $errors[] = 'Kode login wajib diisi.';
        }
        if (empty($password)) {
            $errors[] = 'Password wajib diisi.';
        }
        if ($password !== $confirmPassword) {
            $errors[] = 'Konfirmasi password tidak cocok.';
        }

        // Validasi kode rahasia berdasarkan jabatan
        $kodeRahasiaAdmin = 'KODE-ADMIN-2025';
        $kodeRahasiaKepalaDesa = 'KODE-KEPALADESA-2025';

        if ($jabatan == 'admin' && $kode_rahasia !== $kodeRahasiaAdmin) {
            $errors[] = 'Kode rahasia untuk Admin salah.';
        }
        if ($jabatan == 'kepala_desa' && $kode_rahasia !== $kodeRahasiaKepalaDesa) {
            $errors[] = 'Kode rahasia untuk Kepala Desa salah.';
        }

        // Cek kode_login sudah dipakai belum
        $aparatModel = new \App\Models\AparatModel();
        if ($aparatModel->where('kode_login', $kode_login)->first()) {
            $errors[] = 'Kode login sudah digunakan. Gunakan kode lain.';
        }

        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Hash password dan simpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $aparatModel->insert([
            'nama' => $nama,
            'jabatan' => $jabatan,
            'kode_login' => $kode_login,
            'password' => $hashedPassword
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
