<?php

namespace App\Database\Seeds;

class MemberBanksSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "member_banks";
        $data = [
            [
                'name' => 'BCA',
                'created_by'    => '1'
            ],[
                'name' => 'Mandiri',
                'created_by'    => '1'
            ],[
                'name' => 'BNI',
                'created_by'    => '1'
            ],[
                'name' => 'BRI',
                'created_by'    => '1'
            ],[
                'name' => 'CIMB',
                'created_by'    => '1'
            ],[
                'name' => 'DANAMON',
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
