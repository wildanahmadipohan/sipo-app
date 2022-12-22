<?php

namespace Tests\Support\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $allowedFields = ['kd_obat', 'nama', 'jenis', 'suhu_penyimpanan', 'satuan', 'keterangan'];

    public function getObat()
    {
        return $this->orderBy('kd_obat', 'ASC')->findAll();
    }
}
