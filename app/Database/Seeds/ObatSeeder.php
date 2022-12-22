<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kd_obat' => 'OB0001',
                'nama'    => 'Paracetamol',
                'jenis'    => 'Narkotika',
                'suhu_penyimpanan'  => 20,
                'satuan'    => 'Tablet'
            ],
            [
                'kd_obat' => 'OB0002',
                'nama'    => 'Amoxilin',
                'jenis'    => 'Narkotika',
                'suhu_penyimpanan'  => 20,
                'satuan'    => 'Tablet'
            ],
            [
                'kd_obat' => 'OB0003',
                'nama'    => 'Albendazol suspensi 5ml',
                'jenis'    => 'Narkotika',
                'suhu_penyimpanan'  => 20,
                'satuan'    => 'Botol'
            ],
            [
                'kd_obat' => 'OB0004',
                'nama'    => 'Ambroxol sirup',
                'jenis'    => 'Narkotika',
                'suhu_penyimpanan'  => 20,
                'satuan'    => 'Botol'
            ],
            [
                'kd_obat' => 'OB0005',
                'nama'    => 'Ambroxol tablet',
                'jenis'    => 'Narkotika',
                'suhu_penyimpanan'  => 20,
                'satuan'    => 'Tablet'
            ],
            // [
            //     'kd_obat' => 'OB0006',
            //     'nama'    => 'Albendazol 400 mg',
            //     'jenis'    => 'Narkotika',
            //     'suhu_penyimpanan'  => 20,
            //     'satuan'    => 'Tablet'
            // ],
            // [
            //     'kd_obat' => 'OB0007',
            //     'nama'    => 'Bisoprolol tablet 5 mg',
            //     'jenis'    => 'Narkotika',
            //     'suhu_penyimpanan'  => 20,
            //     'satuan'    => 'Tablet'
            // ],
            // [
            //     'kd_obat' => 'OB0008',
            //     'nama'    => 'Chloramfecort H. Cream',
            //     'jenis'    => 'Narkotika',
            //     'suhu_penyimpanan'  => 20,
            //     'satuan'    => 'Tube'
            // ],
            // [
            //     'kd_obat' => 'OB0009',
            //     'nama'    => 'Diazepam tablet 2 mg',
            //     'jenis'    => 'Narkotika',
            //     'suhu_penyimpanan'  => 20,
            //     'satuan'    => 'Tablet'
            // ],
            // [
            //     'kd_obat' => 'OB00010',
            //     'nama'    => 'Fenitoin Natrium kapsul 100 mg',
            //     'jenis'    => 'Narkotika',
            //     'suhu_penyimpanan'  => 20,
            //     'satuan'    => 'Kapsul'
            // ]
        ];

        $this->db->table('obat')->insertBatch($data);
    }
}
