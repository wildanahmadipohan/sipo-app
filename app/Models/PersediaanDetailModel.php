<?php

namespace App\Models;

use CodeIgniter\Database\RawSql;

use CodeIgniter\Model;

class PersediaanDetailModel extends Model
{
  protected $table = 'persediaan_detail';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_persediaan', 'id_obat', 'no_batch', 'expired', 'kategori_obat', 'lokasi_obat', 'qty', 'status'];

  public function getPersediaanDetail()
  {
    return $this->findAll();
  }

  public function getPersediaanDetailByLocation($idPersediaan)
  {
    $query =  $this->db->table('persediaan_detail')
    ->join('persediaan', 'persediaan_detail.id_persediaan = persediaan.id')
    ->join('obat', 'obat.id = persediaan_detail.id_obat')
    ->where('persediaan_detail.id_persediaan', $idPersediaan)
    ->orderBy('persediaan_detail.expired', 'ASC')
    ->get();  
    return $query;
  }

  public function getPersediaanByFefo($idObat, $lokasi)
  {
    $query = $this->db->table('persediaan_detail')
    ->like('lokasi_obat', $lokasi)
    ->where('id_obat', $idObat)
    ->where('status', 'Tersedia')
    ->orderBy('expired', 'ASC')
    ->get();

    return $query;
  }

  public function getPersediaanJoinObat($idPersediaanDetail)
  {
    $query = $this->db->table('persediaan_detail')
    ->join('obat', 'obat.id = persediaan_detail.id_obat')
    ->where('persediaan_detail.id', $idPersediaanDetail)
    ->get();

    return $query;
  }

  public function getStok($idObat)
  {
    $query = $this->db->table('persediaan_detail')
    ->selectSum('qty')
    ->like('lokasi_obat', 'Apotek')
    ->where('id_obat', $idObat)
    ->get();

    return $query;

    // return $this->select('total_qty')->where('id_obat', $idObat)->first();
  }
}