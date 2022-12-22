<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\PengeluaranModel;
use App\Models\PengeluaranDetailModel;
use App\Models\KetenagaanModel;
use App\Models\PersediaanModel;
use App\Models\PersediaanDetailModel;

class PengeluaranController extends BaseController
{
  protected $obatModel;
  protected $pengeluaranModel;
  protected $pengeluaranDetailModel;
  protected $ketenagaanModel;
  protected $persediaanModel;
  protected $persediaanDetailModel;

  public function __construct()
  {
    $this->obatModel = new ObatModel();
    $this->pengeluaranModel = new PengeluaranModel();
    $this->pengeluaranDetailModel = new PengeluaranDetailModel();
    $this->ketenagaanModel = new KetenagaanModel();
    $this->persediaanModel = new PersediaanModel();
    $this->persediaanDetailModel = new PersediaanDetailModel();
  }

  public function index()
  {
    $pengeluaran = $this->pengeluaranModel->getAll();

    $data = [
      'title' => 'Pengeluaran Obat',
      'pengeluaran' => $pengeluaran
    ];

    return view('data_transaksi/pengeluaran', $data);
  }

  public function detail($idPengeluaran)
  {
    $pengeluaranDetail = $this->pengeluaranDetailModel->getByIdPengeluaran($idPengeluaran)->getResultArray();
    $pengeluaran = $this->pengeluaranModel->getById($idPengeluaran);

    $data = [
      'title' => 'Pengeluaran Obat',
      'pengeluaranDetail' => $pengeluaranDetail,
      'kd_pengeluaran' => $pengeluaran['kd_pengeluaran']
    ];

    return view('data_transaksi/pengeluaran_detail', $data);
  }

  public function create()
  {
    $newKode = $this->generateKodePengeluaran();
    $semuaObat = $this->obatModel->getObat();
    // $dokter = $this->ketenagaanModel->getDokter();

    // kebutuhan testing
    $dokter = [
      [
        'nama' => 'Dr. Terawan'
      ]
    ];
    $username = 'Admin';

    $data = [
      'title'  => 'Pengeluaran Obat',
      'kodePengeluaran' => $newKode,
      // 'user' => user()->username,
      'user' => $username,
      'semuaObat' => $semuaObat,
      'dokter' => $dokter
    ];
    
    return view('transaksi/pengeluaran_obat', $data);
  }

  private function generateKodePengeluaran()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('pengeluaran');
    $builder->select('RIGHT(kd_pengeluaran, 4) as kode', false);
    $builder->orderBy('kd_pengeluaran', 'DESC');
    $builder->limit(1);
    $query = $builder->get();
    $row = $query->getRow();
    
    if (isset($row)) {
        $kodePengeluaran = $row->kode + 1;
    } else {
        $kodePengeluaran = 1;
    }

    $lastKode = str_pad($kodePengeluaran, 4, "0", STR_PAD_LEFT);
    $month = date('m');
    $year = date('y');
    $newKode = "TK" . $year . $month . $lastKode;

    return $newKode;
  }

  public function save()
  {
    $json = $this->request->getJSON();
    $itemObat = $json->items;

    $this->pengeluaranModel->insert([
      'kd_pengeluaran' => $json->kd_pengeluaran,
      'tgl_pengeluaran' => $json->tgl_pengeluaran,
      'jenis' => $json->jenis,
      'nama_dokter' => $json->dokter,
      'nama_pengguna' => $json->pasien,
      'jk_pengguna' => $json->jk,
      'umur_pengguna' => $json->umur,
      'petugas' => $json->petugas,
      'keterangan' => $json->keterangan
    ]);

    foreach ($itemObat as $item) {
      // cari persediaan berdasarkan idObat
      $persediaan = $this->persediaanModel->getPersediaanByIdObat($item->idObat);

      // update total qty persediaan
      $this->persediaanModel->update($persediaan['id'], ['total_qty' => $persediaan['total_qty'] - $item->qty]);
      
      $persediaanDetail = $this->persediaanDetailModel->getPersediaanByFefo($item->idObat, 'Apotek')->getResult();
      
      $qty = $item->qty;
      
      foreach ($persediaanDetail as $pd) {
        $stok = $pd->qty;
        $sisa = $stok - $qty;
        
        if ($sisa < 0) {
          // insert pengeluaran detail
          $this->insertPengeluaranDetail($pd->id, $item, $stok);
      
          $this->persediaanDetailModel->set('qty', 0)->set('status', 'Habis')->where('id', $pd->id)->update();
          $qty = $sisa * -1;
        } else {
          // insert pengeluaran detail
          $this->insertPengeluaranDetail($pd->id, $item, $qty);
          
          if ($sisa == 0) {
            $this->persediaanDetailModel->set('qty', $sisa)->set('status', 'Habis')->where('id', $pd->id)->update();
          } else {
            $this->persediaanDetailModel->set('qty', $sisa)->where('id', $pd->id)->update();
          }
          break;
        }
      }
    }

    $data = [
      'success' => true
    ];

    return $this->response->setJSON($data);
  }

  private function insertPengeluaranDetail($idPersediaanDetail, $item, $qty)
  {
    $this->pengeluaranDetailModel->insert([
      'id_pengeluaran' => $this->pengeluaranModel->getInsertID(),
      'id_obat' => $item->idObat,
      'id_persediaan_detail' => $idPersediaanDetail,
      'qty' => $qty
    ]);
  }
}