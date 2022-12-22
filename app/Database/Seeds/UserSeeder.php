<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'admin@gmail.com',
            'username'    => 'admin',
            'password_hash'  => '$2y$10$yEQh0wTTg1kDV/LgTaynDuKbFclyF3OKM2vS.83LZgFk8XLdeqtsK',
            'active'    => '1'
        ];

        $this->db->table('users')->insert($data);
    }
}
