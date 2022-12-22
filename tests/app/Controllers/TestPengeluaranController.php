<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class TestPengeluaranController extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;
    protected $migrate = true;

    public function testCreate()
    {
      $result = $this->withURI('http://localhost:8080/transaksi/pengeluaran')
        ->controller(\App\Controllers\PengeluaranController::class)
        ->execute('create');
        
        $result->assertOK();
        $result->assertSee('Transaksi Pengeluaran Obat', 'h1');
        $result->assertSeeElement('#form-pengeluaran');
        $result->assertSeeInField('kd_pengeluaran', 'TK22060001');
        $result->assertSeeInField('petugas', 'Admin');
    }
}