<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'tb_karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['nomor_pegawai', 'nama', 'id_jabatan', 'gaji'];
}
