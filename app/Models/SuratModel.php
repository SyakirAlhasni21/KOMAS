<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $allowedFields = ['nik_penduduk', 'tipe_surat', 'status', 'tgl_pengajuan', 'tgl_selesai', 'nik_aparat', 'nama_file', 'deskripsi'];
}
