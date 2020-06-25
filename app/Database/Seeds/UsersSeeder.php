<?php

namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "users";
        $data = [
            'username' => 'amar',
            'email'    => 'amar.ronaldo.m@gmail.com',
            'password' => password_hash("test", PASSWORD_DEFAULT),
            'created_by'    => '1',
            'user_group_id'    => '1',
        ];
        // Using Query Builder
        $this->db->disableForeignKeyChecks();
        $db = $this->db->table($table);
        $db->truncate();
        $db->insert($data);
        $this->db->enableForeignKeyChecks();
    }
}
