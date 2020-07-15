<?php

namespace App\Database\Seeds;

class MemberSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "members";
        $data = [
           'name'=>'amarr',
           'phone'=>'08211111111',
           'Yahoo_message'=>'-',
           'email'=>'amar.ronaldo.m@gmail.com',
           'note'=>'member baru - test',
        ];
        // Using Query Builder
        $this->db->disableForeignKeyChecks();
        $db = $this->db->table($table);
        $db->truncate();
        $db->insert($data);
        $this->db->enableForeignKeyChecks();
    }
}
