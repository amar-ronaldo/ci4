<?php

namespace App\Database\Seeds;

class UserGroupsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "user_groups";
        $data = [
            [
                'name' => 'Supervisor',
                'created_by'    => '1'
            ],[
                'name' => 'Operator',
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
