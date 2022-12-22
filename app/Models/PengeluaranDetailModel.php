<?php

namespace App\Models;


use CodeIgniter\Model;

class PengeluaranDetailModel extends Model
{
  protected $table = 'pengeluaran_detail';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pengeluaran', 'id_obat', 'id_persediaan_detail', 'qty'];

  public function getSumByBulan($bulan, $idObat)
  {
    $bulanFix = date('m', mktime(0, 0, 0, $bulan, 10));

    $query = $this->db->table('pengeluaran_detail')
      ->select('sum(qty) as total')
      ->where('id_obat', $idObat)
      ->where('month(created_at)', $bulanFix)
      ->get();

    return $query;
  }

  public function getByIdPengeluaran($idPengeluaran)
  {
    $query = $this->db->table('pengeluaran_detail')
        ->join('obat', 'pengeluaran_detail.id_obat = obat.id')
        ->where('id_pengeluaran', $idPengeluaran)
        ->get();

    return $query;
  }
}