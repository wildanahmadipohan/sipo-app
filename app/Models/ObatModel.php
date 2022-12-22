<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_obat', 'nama', 'jenis', 'suhu_penyimpanan', 'satuan', 'keterangan'];

    // protected $useTimestamps = true;

    public function getObat()
    {
        return $this->orderBy('kd_obat', 'ASC')->findAll();
    }
}