<?php

namespace App\Controllers;

// ini_set('max_execution_time', 1200);

// use Dompdf\Dompdf;
// use Dompdf\Options;
use Mpdf\Mpdf;

use App\Controllers\Support;

use App\Models\PemesananModel;
use App\Models\KetenagaanModel;
use App\Models\PersediaanModel;
use App\Models\PenerimaanDetailModel;
use App\Models\PengeluaranDetailModel;

class PemesananController extends BaseController
{
  protected $pemesananModel;
  protected $ketenagaanModel;
  protected $persediaanModel;
  protected $penerimaanDetailModel;
  protected $pengeluaranDetailModel;
  
  protected $support;

  public function __construct()
  {
    $this->pemesananModel = new PemesananModel();
    $this->ketenagaanModel = new KetenagaanModel();
    $this->persediaanModel = new PersediaanModel();
    $this->penerimaanDetailModel = new PenerimaanDetailModel();
    $this->pengeluaranDetailModel = new PengeluaranDetailModel();

    $this->support = new Support();
  }

  public function index()
  {
    $pemesanan = $this->pemesananModel->getAll();

    $data = [
      'title' => 'Data Pemesanan Obat',
      'pemesanan' => $pemesanan
    ];
    return view('data_transaksi/pemesanan', $data);
  }

  public function create()
  {
    $newKode = $this->generateKodePemesanan();

    $data = [
      'title' => 'Pemesanan Obat',
      'kodePemesanan' => $newKode, 
      'user' => user()->username,
    ];

    return view('transaksi/pemesanan_obat', $data);
  }

  private function generateKodePemesanan()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('pemesanan');
    $builder->select('RIGHT(kd_pemesanan, 4) as kode', false);
    $builder->orderBy('kd_pemesanan', 'DESC');
    $builder->limit(1);
    $query = $builder->get();
    $row = $query->getRow();
    
    if (isset($row)) {
        $kodePemesanan = $row->kode + 1;
    } else {
        $kodePemesanan = 1;
    }

    $lastKode = str_pad($kodePemesanan, 4, "0", STR_PAD_LEFT);
    $month = date('m');
    $year = date('y');
    $newKode = "TP" . $year . $month . $lastKode;

    return $newKode;
  }

  public function save()
  {
    $validate = $this->validate([
      'kd_pemesanan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kode Pemesanan tidak boleh kosong'
        ]
      ],
      'no_dokumen' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor Dokumen tidak boleh kosong'
        ]
      ],
      'tgl_dokumen' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Dokumen tidak boleh kosong'
        ]
      ],
      'bulan' => [
        'rules' => 'required|numeric|min_length[2]|max_length[2]',
        'errors' => [
          'required' => 'Bulan tidak boleh kosong',
          'numeric' => 'Bulan harus berisi angka',
          'min_length' => 'Bulan terlalu pendek',
          'max_length' => 'Bulan terlalu panjang'
        ]
      ],
      'tahun' => [
        'rules' => 'required|numeric|min_length[4]|max_length[4]',
        'errors' => [
          'required' => 'Tahun tidak boleh kosong',
          'numeric' => 'Tahun harus berisi angka',
          'min_length' => 'Tahun terlalu pendek',
          'max_length' => 'Tahun terlalu panjang'
        ]
      ],
      'umum' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Umum tidak boleh kosong',
          'numeric' => 'Umum harus berisi angka'
        ]
      ],
      'bpjs' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'BPJS tidak boleh kosong',
          'numeric' => 'BPJS harus berisi angka'
        ]
      ],
      'jamkesda' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'JAMKESDA tidak boleh kosong',
          'numeric' => 'JAMKESDA harus berisi angka'
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

    $data = [
      'kd_pemesanan' => $this->request->getVar('kd_pemesanan'),
      'no_dokumen' => $this->request->getVar('no_dokumen'),
      'tgl_dokumen' => $this->request->getVar('tgl_dokumen'),
      'bulan' => $this->request->getVar('bulan'),
      'tahun' => $this->request->getVar('tahun'),
      'umum' => $this->request->getVar('umum'),
      'bpjs' => $this->request->getVar('bpjs'),
      'jamkesda' => $this->request->getVar('jamkesda'),
      'petugas' => $this->request->getVar('petugas'),
      'keterangan' => $this->request->getVar('keterangan')
    ];

    $this->pemesananModel->save($data);
    session()->setFlashData('inserted', 'Data pemesanan berhasil disimpan');

    return redirect()->to('/transaksi/pemesanan');
  }

  public function generatePdf($bulan = 1)
  {
    $pemesanan = $this->pemesananModel->getByBulan($bulan);
    $kepalaPuskesmas = $this->ketenagaanModel->getKepala();
    $petugasFarmasi = $this->ketenagaanModel->getFarmasi();
    
    $dataLPLPO = $this->getLPLPO($bulan);

    $pemesanan['tgl_dokumen'] = $this->support->tanggalIndoFull($pemesanan['tgl_dokumen']);
    $pemesanan['bulan'] = $this->support->bulanIndo($pemesanan['bulan']);
    
    $data = [
      'pemesanan' => $pemesanan,
      'kepalaPuskesmas' => $kepalaPuskesmas,
      'petugasFarmasi' => $petugasFarmasi,
      'dataLPLPO' => $dataLPLPO
    ];
    
    $filename = date('y-m-d-H-i-s'). '-lplpo-' . $pemesanan['kd_pemesanan'];

    $mpdf = new Mpdf(['mode' => 'utf-8']);
    // dd($mpdf);
    $html = view('laporan/lplpo', $data);
    $mpdf->WriteHTML($html);
    return redirect()->to($mpdf->Output('arjun.pdf','I'));


    // $options = new Options();
    // $options->set('isRemoteEnabled', true);
    // $options->set('chroot', base_url());
    // // instantiate and use the dompdf class
    // $dompdf = new Dompdf($options);
    // // dd($dompdf);
    // $contxt = stream_context_create([ 
    //     'ssl' => [ 
    //         'verify_peer' => FALSE, 
    //         'verify_peer_name' => FALSE,
    //         'allow_self_signed'=> TRUE
    //     ] 
    // ]);
    // $dompdf->setHttpContext($contxt);
    // // load HTML content
    // $dompdf->loadHtml(view('laporan/lplpo', $data));
    // // (optional) setup the paper size and orientation
    // $dompdf->setPaper('A4', 'landscape');
    // // render html as PDF
    // $dompdf->render();
    // // output the generated pdf
    // $dompdf->stream($filename, array("Attachment" => false));
  }

  private function getLPLPO($bulan)
  {
    $dataPersediaan = $this->persediaanModel->getLPLPO()->getResult(); 

    foreach ($dataPersediaan as $key => $data) {
      $sumPenerimaan = $this->penerimaanDetailModel->getSumByBulan($bulan, $data->id_obat)->getResult();
      $sumPengeluaran = $this->pengeluaranDetailModel->getSumByBulan($bulan, $data->id_obat)->getResult();

      $data->stok_awal == null ? $dataPersediaan[$key]->stok_awal = '0' : $dataPersediaan[$key]->stok_awal = $data->stok_awal;

      $data->stok_akhir == null ? $dataPersediaan[$key]->stok_akhir = '0' : $dataPersediaan[$key]->stok_akhir = $data->stok_akhir;

      $data->total_qty == null ? $dataPersediaan[$key]->total_qty = '0' : $dataPersediaan[$key]->total_qty = $data->total_qty;
      
      if ($sumPenerimaan[0]->total == null) {
        $dataPersediaan[$key]->total_penerimaan = '0';
      } else {
        $dataPersediaan[$key]->total_penerimaan = $sumPenerimaan[0]->total;
      }

      if ($sumPengeluaran[0]->total == null) {
        $dataPersediaan[$key]->total_pengeluaran = '0';
      } else {
        $dataPersediaan[$key]->total_pengeluaran = $sumPengeluaran[0]->total;
      }

      $dataPersediaan[$key]->persediaan = $dataPersediaan[$key]->stok_awal + $dataPersediaan[$key]->total_penerimaan;

      $permintaan = (3 * $dataPersediaan[$key]->total_pengeluaran) - $dataPersediaan[$key]->total_qty;
      
      if ($permintaan <= 0) {
        $dataPersediaan[$key]->permintaan = '';
      } else {
        $dataPersediaan[$key]->permintaan = $permintaan;
      }
    }

    return $dataPersediaan;
  }
}