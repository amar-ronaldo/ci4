<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuTypes extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'        => TRUE,
                'auto_increment'    => TRUE
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ]
        ]);
        $this->forge->addPrimaryKey('id');


        $this->forge->createTable('menu_types', TRUE);
        echo 'Database menu_types created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('menu_types', TRUE);
        echo 'Database menu_types deleted!' . PHP_EOL;
    }
}
