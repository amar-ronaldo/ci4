<?php

namespace App\Database\Seeds;

class UsergroupsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "user_groups";
        $data = [
            [
                'name' => 'Superadmin',
                'created_by'    => '1'
            ],[
                'name' => 'User',
                'created_by'    => '1'
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
