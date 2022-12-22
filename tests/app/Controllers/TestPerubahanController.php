<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class TestPerubahanController extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;
    protected $migrate = true;

    public function testCreate()
    {
      $result = $this->withURI('http://localhost:8080/transaksi/perubahan')
        ->controller(\App\Controllers\PerubahanLokasiController::class)
        ->execute('create');
        
        $result->assertOK();
        $result->assertSee('Transaksi Perubahan Lokasi Obat', 'h1');
        $result->assertSeeElement('#form-perubahan');
        $result->assertSeeInField('kd_perubahan', 'SA22060001');
        $result->assertSeeInField('petugas', 'Admin');
    }
}