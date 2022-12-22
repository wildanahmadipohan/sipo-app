<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaanModel extends Model
{
    protected $table = 'penerimaan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_penerimaan', 'no_sbbk', 'tgl_penerimaan', 'petugas', 'keterangan'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getById($idPenerimaan)
    {
        return $this->where('id', $idPenerimaan)->first();
    }
}