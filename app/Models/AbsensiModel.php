<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table      = 'tb_absensi';
    protected $primaryKey = 'id_absensi';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_karyawan', 'masuk', 'izin', 'sakit',];
}
