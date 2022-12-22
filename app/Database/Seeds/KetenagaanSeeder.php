<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KetenagaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'H. MOHAMMAD TASLIM. SKM',
                'nip'    => '19800421 200801 1 007 / III c',
                'status'  => "Kepala Puskesmas",
                'pendidikan'    => 'S1'
            ],
            [
                'nama'    => 'dr. REGI NORMAN',
                'nip'    => '19761004 200903 1 003 / III d',
                'status'  => "Dokter",
                'pendidikan'    => 'S1'
            ],
            [
                'nama'    => 'DROSNA WATI TAMPUBOLON, S.Farm',
                'nip'    => 'TKS',
                'status'  => "Farmasi",
                'pendidikan'    => 'S1'
            ],
        ];

        $this->db->table('ketenagaan')->insertBatch($data);
    }
}
