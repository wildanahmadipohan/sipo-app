<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\PenerimaanModel;
use App\Models\PenerimaanDetailModel;
use App\Models\PersediaanModel;
use App\Models\PersediaanDetailModel;

class PenerimaanController extends BaseController
{
  protected $obatModel;
  protected $penerimaanModel;
  protected $penerimaanDetailModel;
  protected $PersediaanModel;
  protected $PersediaanDetailModel;

  public function __construct()
  {
      $this->obatModel = new ObatModel();
      $this->penerimaanModel = new PenerimaanModel();
      $this->penerimaanDetailModel = new PenerimaanDetailModel();
      $this->persediaanModel = new PersediaanModel();
      $this->persediaanDetailModel = new PersediaanDetailModel();
  }
  
  public function index()
  {
    $penerimaan = $this->penerimaanModel->getAll();

    $data = [
      'title'  => 'Penerimaan Obat',
      'penerimaan' => $penerimaan
    ];
    
    return view('data_transaksi/penerimaan', $data);
  }

  public function detail($idPenerimaan)
  {
    $penerimaanDetail = $this->penerimaanDetailModel->getByIdPenerimaan($idPenerimaan)->getResultArray();
    $penerimaan = $this->penerimaanModel->getById($idPenerimaan);
    // dd($penerimaanDetail);

    $data = [
      'title'  => 'Penerimaan Obat',
      'penerimaanDetail' => $penerimaanDetail,
      'sbbk' => $penerimaan['no_sbbk']
    ];
    
    return view('data_transaksi/penerimaan_detail', $data);
  }

  public function create()
  {
    $newKode = $this->generateKodePenerimaan();
    $semuaObat = $this->obatModel->getObat();

    // kebutuhan testing
    $username = 'Admin';

    $data = [
      'title'  => 'Penerimaan Obat',
      'kodePenerimaan' => $newKode,
      // 'user' => user()->username,
      'user' => $username,
      'semuaObat' => $semuaObat
    ];
    
    return view('transaksi/penerimaan_obat', $data);
  }

  private function generateKodePenerimaan()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('penerimaan');
    $builder->select('RIGHT(kd_penerimaan, 4) as kode', false);
    $builder->orderBy('kd_penerimaan', 'DESC');
    $builder->limit(1);
    $query = $builder->get();
    $row = $query->getRow();
    
    if (isset($row)) {
        $kodePenerimaan = $row->kode + 1;
    } else {
        $kodePenerimaan = 1;
    }

    $lastKode = str_pad($kodePenerimaan, 4, "0", STR_PAD_LEFT);
    $month = date('m');
    $year = date('y');
    $newKode = "TM" . $year . $month . $lastKode;

    return $newKode;
  }

  public function save()
  {
    $json = $this->request->getJSON();

    $itemObat = $json->items;

    $this->penerimaanModel->insert([
      'kd_penerimaan' => $json->kd_penerimaan,
      'no_sbbk' => $json->sbbk,
      'tgl_penerimaan' => $json->tgl_penerimaan,
      'petugas' => $json->petugas,
      'keterangan' => $json->keterangan
    ]);

    foreach ($itemObat as $item) {
      $persediaan = $this->persediaanModel->getPersediaanByIdObat($item->idObat);

      if ($persediaan) {
        $this->persediaanModel->update($persediaan['id'], ['total_qty' => $persediaan['total_qty'] + $item->qty]);

        $this->insertPersediaanDetail($persediaan['id'], $item);
        $this->insertPenerimaanDetail($persediaan['id'], $item);
      } else {
        // how to use try catch
        $this->persediaanModel->insert([
          'id_obat' => $item->idObat,
          'total_qty' => $item->qty
        ]);

        $this->insertPersediaanDetail($this->persediaanModel->getInsertID(), $item);
        $this->insertPenerimaanDetail($this->persediaanModel->getInsertID(), $item);
      }
    }
    
    $data = [
      'success' => true,
      'message' => 'Data inserted.'
    ];

    return $this->response->setStatusCode(201)->setJSON($data);
  }

  private function insertPersediaanDetail($idPersediaan, $item)
  {
    $this->persediaanDetailModel->insert([
      'id_persediaan' => $idPersediaan,
      'id_obat' => $item->idObat,
      'no_batch' => $item->batch,
      'expired' => $item->tgl_expire,
      'kategori_obat' => $item->kategori,
      'lokasi_obat' => $item->lokasi,
      'qty' => $item->qty,
      'status' => 'Tersedia'
    ]);
  }

  private function insertPenerimaanDetail($idPersediaan, $item)
  {
    $this->penerimaanDetailModel->insert([
      'id_penerimaan' => $this->penerimaanModel->getInsertID(),
      'id_obat' => $item->idObat,
      'id_persediaan' => $idPersediaan,
      'qty' => $item->qty
    ]);
  }
}
