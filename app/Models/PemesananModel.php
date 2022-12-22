<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_pemesanan', 'no_dokumen', 'tgl_dokumen', 'bulan', 'tahun', 'umum', 'bpjs', 'jamkesda', 'petugas', 'keterangan'];

    public function getAll()
    {
        return $this->findAll();
    }

    public function getByBulan($bulan = 1)
    {
      return $this->where('bulan', $bulan)->first();
    }
}