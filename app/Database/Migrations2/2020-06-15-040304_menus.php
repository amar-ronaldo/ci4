<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menus extends Migration
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
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'controller' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'default'        => '#',
            ],
            'breadcrumb' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'icon' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'menu_id' => [
                'type'              => 'INT',
                'constraint'        => 10,  
                'unsigned'          => true,
                'null'              => true,
            ],
            'menu_type_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
                'null'              => true,
            ],
            'order' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'default'        => '1',
            ],
            'created_at' => [
                'type'              => 'TIMESTAMP',

            ],
            'created_by' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
             'updated_at TIMESTAMP NULL DEFAULT NULL',
            'updated_by' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
             'deleted_at TIMESTAMP NULL DEFAULT NULL',
            'deleted_by' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('menu_id', 'menus', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('menu_type_id', 'menu_types', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('deleted_by', 'users', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('menus', TRUE);
        echo 'Database menus created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('menus', TRUE);
        echo 'Database menus deleted!' . PHP_EOL;
    }
}
