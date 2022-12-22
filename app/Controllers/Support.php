<?php

namespace App\Controllers;

class Support {
  protected $bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
		);

  public function tanggalIndoFull($tanggal)
  { 
    $split = explode('-', $tanggal);
	  return $split[2] . ' ' . $this->bulan[ (int)$split[1] ] . ' ' . $split[0];
  }

  public function bulanIndo($bulan)
  {
    return $this->bulan[(int)$bulan];
  }
}