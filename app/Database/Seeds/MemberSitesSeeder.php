<?php

namespace App\Database\Seeds;

class MemberSitesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "member_sites";
        $data = [
            [
                'name' => 'PS',
                'url' => 'http://pialasport.com/',
                'created_by'    => '1'
            ], [
                'name' => 'PP',
                'url' => 'https://pialapokerqq.biz/',
                'created_by'    => '1'
            ], [
                'name' => 'PB',
                'url' => 'https://pialabet.pw/',
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
