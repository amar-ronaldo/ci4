<?php

namespace App\Database\Seeds;

class UsersGroupsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "users_groups";
        $data = [
            [
                'user_id'    => '1',
                'user_group_id'    => '1',
            ],
            [
                'user_id'    => '2',
                'user_group_id'    => '2',
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
