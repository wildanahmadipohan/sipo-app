<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestHome extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testIndex()
    {
      $result = $this->withURI('http://localhost:8080/')
        ->controller(\App\Controllers\Home::class)
        ->execute('index');
        
        $result->assertOK();
        $result->assertSee('Beranda', 'h1');
        $result->assertSeeElement('.small-box bg-info');
        $result->assertSeeElement('.small-box bg-success');
        $result->assertSeeElement('.small-box bg-warning');
        $result->assertSeeElement('.small-box bg-info');
    }
}