<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login&register/login');
    }
    public function login()
    {
        $identitas = $this->request->getPost('identitas');
        $password = $this->request->getPost('password');

        $errors = [];

        if (empty($identitas)) {
            $errors[] = 'NIK atau Kode Login wajib diisi.';
        }
        if (empty($password)) {
            $errors[] = 'Password wajib diisi.';
        }
        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $pendudukModel = new \App\Models\PendudukModel();
        $dusuns = ['i', 'ii', 'iii'];
        $penduduk = null;
        $dusun_aktif = null;

        foreach ($dusuns as $dusun) {
            try {
                $pendudukModel->setTableByDusun($dusun);
                $data = $pendudukModel->getPendudukByNik($identitas);
                if ($data && !empty($data['password']) && password_verify($password, $data['password'])) {
                    $penduduk = $data;
                    $dusun_aktif = $dusun;
                    break;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        if ($penduduk) {
            session()->set([
                'nik' => $penduduk['nik'],
                'nama' => $penduduk['Nama Lengkap'] ?? '',
                'dusun' => $dusun_aktif,
                'role' => 'penduduk',
                'logged_in' => true
            ]);
            return redirect()->to('/')->with('success', 'Login berhasil.');
        }

        // Kalau bukan penduduk, cek aparat
        $aparatModel = new \App\Models\AparatModel(); // <-- buat model baru nanti
        $aparat = $aparatModel->where('kode_login', $identitas)->first();

        if ($aparat && password_verify($password, $aparat['password'])) {
            session()->set([
                'nama' => $aparat['nama'],
                'jabatan' => $aparat['jabatan'],
                'role' => $aparat['jabatan'], // 'admin' atau 'kepala_desa'
                'logged_in' => true
            ]);
            return redirect()->to('/admin')->with('success', 'Login berhasil sebagai ' . $aparat['jabatan']);
        }

        return redirect()->back()->withInput()->with('errors', ['Identitas atau Password salah.']);
    }


    // public function login()
    // {
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');
    //     $errors = [];

    //     // Validate input
    //     if (empty($email)) {
    //         $errors[] = 'Email wajib diisi.';
    //     }



    //     $aparatModel = new AparatModel();
    //     $pendudukModel = new PendudukModel();

    //     $user = $aparatModel->where('email', $email)->first();
    //     $role = $user ? 'aparat' : null;

    //     if (!$user) {
    //         $user = $pendudukModel->where('email', $email)->first();
    //         $role = $user ? 'user' : null;
    //     }

    //     if (!$user || !password_verify($password, $user['password'])) {
    //         log_message('error', "Login failed for email: $email");
    //         return view('login&register/login', ['errors' => ['Email atau password salah.']]);
    //     }

    //     // Regenerate session for security
    //     session()->regenerate();

    //     // Save user data to session
    //     session()->set([
    //         'role' => $role,
    //         'user' => $user,
    //         'logged_in' => true
    //     ]);

    //     session()->setFlashdata('message', "Selamat datang, {$user['nama']}! Anda berhasil login.");


    //     // Redirect based on role
    //     return redirect()->to('/');
    // }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('message', 'Anda telah logout.');
    }
}
