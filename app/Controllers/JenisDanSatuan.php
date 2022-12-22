<?php

namespace App\Controllers;

use App\Models\JenisModel;
use App\Models\SatuanModel;

class JenisDanSatuan extends BaseController
{
  protected $jenisObat;
  protected $satuanObat;

  public function __construct()
  {
    $this->jenisModel = new JenisModel();
    $this->satuanModel = new SatuanModel();
  }

  public function index()
  {
    $jenisModel = $this->jenisModel->findAll();
    $satuanModel = $this->satuanModel->findAll();

    $data = [
        'title' => 'Data Obat',
        'jenisObat' => $jenisModel,
        'satuanObat' => $satuanModel
    ];

    return view('master_obat/jenis_dan_satuan', $data);
  }

  public function save()
  {
    if ($this->request->getVar('type') === 'jenis') {
      $this->jenisModel->save([
        'jenis' => $this->request->getVar('jenis')
      ]);

      session()->setFlashdata('tambah jenis', 'Data jenis obat ditambahkan.');
    } else if ($this->request->getVar('type') === 'satuan') {
      $this->satuanModel->save([
        'satuan' => $this->request->getVar('satuan')
      ]);
      session()->setFlashdata('tambah satuan', 'Data satuan obat ditambahkan.');
    }

    return redirect()->to('/obat/jenisdansatuan');
  }
}