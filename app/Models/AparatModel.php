<?php

namespace App\Models;

use CodeIgniter\Model;

class AparatModel extends Model
{
    protected $table = 'aparat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jabatan', 'kode_login', 'password'];
}
