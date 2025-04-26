<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table;
    protected $primaryKey = 'nik';
    protected $allowedFields = [
        'nik',
        'Nama Lengkap',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Agama',
        'Jenis Kelamin',
        'Pekerjaan',
        'Umur',
        'Pendidikan Terakhir',
        'password'
    ];

    public function setTableByDusun(?string $dusun)
    {
        if (!$dusun) {
            throw new \InvalidArgumentException("Dusun tidak boleh kosong.");
        }

        switch (strtolower($dusun)) {
            case 'i':
                $this->table = 'dusun_i';
                break;
            case 'ii':
                $this->table = 'dusun_ii';
                break;
            case 'iii':
                $this->table = 'dusun_iii';
                break;
            default:
                throw new \InvalidArgumentException("Dusun tidak valid: $dusun");
        }

        return $this;
    }
    public function cariNamaBerdasarkanNik($nik)
    {
        $dusunTables = ['dusun_i', 'dusun_ii', 'dusun_iii'];

        foreach ($dusunTables as $table) {
            $this->setTable($table);
            $penduduk = $this->where('nik', $nik)->first();
            if ($penduduk) {
                return $penduduk['Nama Lengkap']; // Sesuaikan field
            }
        }

        return null; // Kalau tidak ketemu di semua dusun
    }
    public function getPendudukByNik(string $nik)
    {
        return $this->where('nik', $nik)->first();
    }
}
