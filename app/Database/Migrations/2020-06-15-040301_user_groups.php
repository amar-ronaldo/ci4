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
            ],
            'updated_at'         => [
                'type'              => 'TIMESTAMP',
            ],
            'updated_by'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
            ],
            'deleted_at'         => [
                'type'              => 'TIMESTAMP',
            ],
            'deleted_by'         => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE,
                'null'=>true,
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
