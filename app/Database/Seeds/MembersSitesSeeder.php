<?php

namespace App\Database\Seeds;

class MembersSitesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "members_sites";
        $data = [
            [
                'member_id' => '1',
                'member_site_id' => '1',
                'username' => 'amar_ronaldo',
                'note' => 'member baru - test'
            ],
            [
                'member_id' => '2',
                'member_site_id' => '1',
                'username' => 'amar_ronaldo2',
                'note' => 'member baru - test',
            ]
        ];
        // Using Query Builder
        $this->db->disableForeignKeyChecks();
        $db = $this->db->table($table);
        $db->truncate();
        $db->insertBatch($data);
        $this->db->enableForeignKeyChecks();
    }
}
