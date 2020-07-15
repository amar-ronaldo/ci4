<?php

namespace App\Database\Seeds;

class MembersBanksSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "members_banks";
        $data = [
            [
                'member_id' => '1',
                'member_bank_id' => '1',
                'account_name' => 'ammar__',
                'account_number' => '1231-1231-1231-1231',
                'created_by'    => '1'
            ],
            [
                'member_id' => '1',
                'member_bank_id' => '2',
                'account_name' => 'ammar__22',
                'account_number' => '2231-2231-2231-2231',
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
