<?php

namespace App\Database\Seeds;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $table = "menus";
        $data = [
            [
                'id'=>1,
                'name' => 'Dashboard',
                'breadcrumb' => 'Dashboard',
                'icon' => 'far fa-speedometer',
                'menu_type_id' => '1',
                'menu_id' => null,
            ],[
                'id'=>2,
                'name' => 'User Management',
                'breadcrumb' => 'User Management',
                'icon' => 'far fa-users',
                'menu_type_id' => '1',
                'menu_id' => null,
            ],[
                'id'=>3,
                'name' => 'User',
                'breadcrumb' => 'User',
                'icon' => 'far fa-user',
                'menu_type_id' => '1',
                'menu_id' => 2,
            ],[
                'id'=>4,
                'name' => 'Role User',
                'breadcrumb' => 'Role User',
                'icon' => 'far fa-user-secret',
                'menu_type_id' => '1',
                'menu_id' => 2,
            ],[
                'id'=>5,
                'name' => 'Setting',
                'breadcrumb' => 'Setting',
                'icon' => 'far fa-settings',
                'menu_type_id' => '1',
                'menu_id' => null,
            ],[
                'id'=>6,
                'name' => 'Menu Management',
                'breadcrumb' => 'Menu Management',
                'icon' => 'far fa-list-alt',
                'menu_type_id' => '1',
                'menu_id' => 5,
            ],[
                'id'=>7,
                'name' => 'Email',
                'breadcrumb' => 'Email',
                'icon' => 'far fa-mail-bulk',
                'menu_type_id' => '1',
                'menu_id' => 5,
            ],[
                'id'=>8,
                'name' => 'Email Template',
                'breadcrumb' => 'Email Template',
                'icon' => '#',
                'menu_type_id' => '1',
                'menu_id' => 7,
            ],[
                'id'=>9,
                'name' => 'Email Akun',
                'breadcrumb' => 'Email Akun',
                'icon' => '#',
                'menu_type_id' => '1',
                'menu_id' => 7,
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
