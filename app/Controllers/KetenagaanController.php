<?php

namespace App\Controllers;

use App\Models\KetenagaanModel;

class KetenagaanController extends BaseController
{
  protected $ketenagaanModel;

  public function __construct()
  {
    $this->ketenagaanModel = new KetenagaanModel();
  }

  public function index()
  {
    $ketenagaan = $this->ketenagaanModel->getKetenagaan();
    // dd($ketenagaan);

    $data = [
      'title' => 'Data Ketenagaan',
      'ketenagaan' => $ketenagaan
    ];

    return view('master_ketenagaan/ketenagaan.php', $data);
  }

  public function tambah()
  {
    $data['title'] = 'Tambah Data Ketenagaan';

    return view('master_ketenagaan/tambah', $data);
  }

  public function save()
  {
    $this->ketenagaanModel->save([
      'nama' => $this->request->getVar('nama'),
      'nip' => $this->request->getVar('nip'),
      'status' => $this->request->getVar('status'),
      'pendidikan' => $this->request->getVar('pendidikan')
    ]);

    session()->setFlashdata('inserted', 'Data ketenagaan berhasil ditambahkan.');

    return redirect()->to('/ketenagaan');
  }
}