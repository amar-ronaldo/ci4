<?php

namespace App\Database\Seeds;

class MenuTypesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "menu_types";
        $data = [
            [
                'name' => 'Backend',
            ],[
                'name' => 'Frontend',
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
