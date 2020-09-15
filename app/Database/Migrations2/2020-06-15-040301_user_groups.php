<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroups extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id'           => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],  
            'name'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'created_at'         => [
                'type'              => 'TIMESTAMP',
            ],
            'created_by'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
            'updated_at TIMESTAMP NULL DEFAULT NULL',
            'updated_by'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
            'deleted_at TIMESTAMP NULL DEFAULT NULL',
            'deleted_by'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        
        $this->forge->addForeignKey('created_by','users','id','CASCADE','NO ACTION');
        $this->forge->addForeignKey('updated_by','users','id','CASCADE','NO ACTION');
        $this->forge->addForeignKey('deleted_by','users','id','CASCADE','NO ACTION');
        $this->forge->createTable('user_groups', TRUE);
        echo 'Database user_groups created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('user_groups', TRUE);
        echo 'Database user_groups deleted!' . PHP_EOL;
    }
}
