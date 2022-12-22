<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\PerubahanModel;
use App\Models\PersediaanDetailModel;

class PerubahanLokasiController extends BaseController
{
  protected $obatModel;
  protected $perubahanModel;
  protected $persediaanDetailModel;

  public function __construct()
  {
    $this->obatModel = new ObatModel();
    $this->perubahanModel = new PerubahanModel();
    $this->persediaanDetailModel = new PersediaanDetailModel();
  }

  public function index()
  {
    $perubahan = $this->perubahanModel->getAll()->getResultArray();

    $data = [
      'title' => 'Data Perubahan Obat',
      'perubahan' => $perubahan
    ];
    return view('data_transaksi/perubahan', $data);
  }

  public function create()
  {
    $newKode = $this->generateKodePerubahan();
    $semuaObat = $this->obatModel->getObat();


    // kebutuhan testing
    // $username = 'Admin';

    $data = [
      'title' => 'Perubahan Lokasi Obat',
      'kodePerubahan' => $newKode,
      'user'  => user()->username,
      // 'user'  => $username,
      'semuaObat' => $semuaObat
    ];

    return view('transaksi/perubahan_obat', $data);
  }

  private function generateKodePerubahan()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('perubahan');
    $builder->select('RIGHT(kd_perubahan, 4) as kode', false);
    $builder->orderBy('kd_perubahan', 'DESC');
    $builder->limit(1);
    $query = $builder->get();
    $row = $query->getRow();
    
    if (isset($row)) {
        $kodePerubahan = $row->kode + 1;
    } else {
        $kodePerubahan = 1;
    }

    $lastKode = str_pad($kodePerubahan, 4, "0", STR_PAD_LEFT);
    $month = date('m');
    $year = date('y');
    $newKode = "SA" . $year . $month . $lastKode;

    return $newKode;
  }

  public function save()
  {
    $validate = $this->validate([
      'kd_perubahan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kode Perubahan tidak boleh kosong.'
        ]
      ],
      'tgl_perubahan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Perubahan tidak boleh kosong'
        ]
      ],
      'lokasi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Lokasi tidak boleh kosong'
        ]
      ],
      'rak' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Lokasi Rak tidak boleh kosong'
        ]
      ],
      'jumlah' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Jumlah tidak boleh kosong',
          'numeric' => 'Jumlah harus berisi angka'
        ]
      ],
      'petugas' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Petugas tidak boleh kosong'
        ]
      ]
    ]);

    if (!$validate) {
      return redirect()->back()->withInput();
    }

    
    $idObat = $this->request->getVar('obat');
    $lokasiTujuan = $this->request->getVar('lokasi') . ' / ' . $this->request->getVar('rak');

    $persediaanDetail = $this->persediaanDetailModel->getPersediaanByFefo($idObat, 'Gudang')->getResult();

    if (empty($persediaanDetail)) {
      return redirect()->back()->withInput()->with('message', 'Obat yang dipilih tidak tersedia di Gudang');
    }

    $this->persediaanDetailModel->set('lokasi_obat', $lokasiTujuan)->where('id', $persediaanDetail[0]->id)->update();

    $data = [
      'kd_perubahan' => $this->request->getVar('kd_perubahan'),
      'tgl_perubahan' => $this->request->getVar('tgl_perubahan'),
      'id_persediaan_detail' => $persediaanDetail[0]->id,
      'lokasi' => $lokasiTujuan,
      'qty' => $this->request->getVar('jumlah'),
      'petugas' => $this->request->getVar('petugas'),
      'keterangan' => $this->request->getVar('keterangan')
    ];

    $this->perubahanModel->save($data);

    session()->setFlashdata('inserted', 'Data perubahan lokasi obat berhasil disimpan.');

    return redirect()->to('/transaksi/perubahan');
  }
}