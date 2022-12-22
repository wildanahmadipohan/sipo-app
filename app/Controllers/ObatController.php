<?php

namespace App\Controllers;

use App\Models\ObatModel;
use App\Models\JenisModel;
use App\Models\SatuanModel;

class ObatController extends BaseController
{
    protected $obatModel;
    protected $jenisModel;
    protected $satuanModel;

    public function __construct()
    {
        $this->obatModel = new ObatModel();
        $this->jenisModel = new JenisModel();
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        $semuaObat = $this->obatModel->getObat();

        $data = [
            'title' => 'Data Obat',
            'semuaObat' => $semuaObat
        ];

        return view('master_obat/obat', $data);
    }

    private function generateKodeObat()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('obat');
        $builder->select('RIGHT(kd_obat, 4) as kode', false);
        $builder->orderBy('kd_obat', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        $row = $query->getRow();
        
        if (isset($row)) {
            $kodeObat = $row->kode + 1;
        } else {
            $kodeObat = 1;
        }

        $lastKode = str_pad($kodeObat, 4, "0", STR_PAD_LEFT);
        $newKode = "OB" . $lastKode;

        return $newKode;
    }

    public function tambah()
    {
        $newKode = $this->generateKodeObat();
        // $jenisObat = $this->jenisModel->getJenis();
        // $satuanObat = $this->satuanModel->getSatuan();

        // kebutuhan testing
        $jenisObat = [
            [
                'jenis' => 'Habis Pakai'
            ]
        ];
        $satuanObat = [
            [
                'satuan' => 'Tablet'
            ]
        ];
        
        $data = [
            'title' => 'Tambah Obat',
            'kodeObat'  => $newKode,
            'jenisObat' => $jenisObat,
            'satuanObat' => $satuanObat
        ];


        return view('master_obat/tambah', $data);
    }

    public function save()
    {
        $this->obatModel->save([
            'kd_obat' => $this->request->getVar('kd_obat'),
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'suhu_penyimpanan' => $this->request->getVar('suhu'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('inserted', 'Data obat berhasil ditambahkan.');

        return redirect()->to('/obat');
    }
}
