<?php

namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "users";
        $data = [
            [
                'username' => 'amar',
                'name' => 'amar',
                'avatar' => 'avatar13.jpg',
                'email'    => 'amar.ronaldo.m@gmail.com',
                'password' => password_hash("test", PASSWORD_DEFAULT),
                'created_by'    => '1',
            ],
            [
                'username' => 'amar2',
                'name' => 'amar2',
                'avatar' => 'avatar13.jpg',
                'email'    => 'amar.bots@gmail.com',
                'password' => password_hash("test", PASSWORD_DEFAULT),
                'created_by'    => '1',
            ],
        ];
        // Using Query Builder
        $this->db->disableForeignKeyChecks();
        $db = $this->db->table($table);
        $db->truncate();
        $db->insertBatch($data);
        $this->db->enableForeignKeyChecks();
    }
}
