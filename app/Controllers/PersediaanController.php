<?php

namespace App\Controllers;

use App\Models\PersediaanModel;
use App\Models\PersediaanDetailModel;

class PersediaanController extends BaseController
{
  protected $persediaanModel;
  protected $persediaanDetailModel;

  public function __construct()
  {
    $this->persediaanModel = new PersediaanModel();
    $this->persediaanDetailModel = new PersediaanDetailModel();
    helper('inflector');
  }

  public function index($lokasi = 'semua')
  {
    // load helper to uppercase first letter
    $persediaan = $this->persediaanModel->getPersediaanJoinToObat(pascalize($lokasi))->getResult();
    // dd($persediaan);
    
    $data = [
        'title' => 'Persediaan Obat',
        'persediaan' => $persediaan,
        'lokasi'  => $lokasi
    ];

    if ($lokasi != 'semua') {
      return view('persediaan/persediaan_lokasi', $data);
    }

    return view('persediaan/persediaan', $data);
  }

  public function detail($idPersediaan)
  {
    $persediaan = $this->persediaanDetailModel->getPersediaanDetailByLocation($idPersediaan)->getResult();
    // dd($persediaan);

    $data = [
        'title' => 'Detail Persediaan Obat',
        'persediaan' => $persediaan
    ];

    return view('persediaan/persediaan_detail', $data);
  }

  public function stok($idObat = 0)
  {
    $stok = $this->persediaanDetailModel->getStok($idObat)->getResult();
    
    return json_encode($stok);
  }
}