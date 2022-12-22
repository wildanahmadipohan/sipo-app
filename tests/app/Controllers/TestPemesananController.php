<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class TestPemesananController extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;
    protected $migrate = true;

    public function testIndex()
    {
      $result = $this->withURI('http://localhost:8080/transaksi/pemesanan')
        ->controller(\App\Controllers\PemesananController::class)
        ->execute('index');
        
        $result->assertOK();
        $result->assertSee('Transaksi Pemesanan Obat', 'h1');
        $result->assertSeeElement('#form-pemesanan');
    }
}