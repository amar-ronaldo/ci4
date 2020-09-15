<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenusGroups extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'menu_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null' => true,

            ],
            'user_group_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null' => true,

            ],
            'c' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'          => '0',
            ],
            'r' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'          => '0',
            ],
            'u' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'          => '0',
            ],
            'd' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'          => '0',
            ],
            'a' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'default'          => '0',
            ]
        ]);
        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('menu_id', 'menus', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('user_group_id', 'user_groups', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('menus_groups', TRUE);
        echo 'Database menus_groups created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('menus_groups', TRUE);
        echo 'Database menus_groups deleted!' . PHP_EOL;
    }
}
