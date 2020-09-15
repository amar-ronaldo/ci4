<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'name'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'avatar'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'password'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'email'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'created_at'         => [
                'type'              => 'TIMESTAMP',
            ],
            'created_by'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null'=>true,
'default'=>null,
            ],
            'updated_at TIMESTAMP NULL DEFAULT NULL',
            'updated_by'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null'=>true,
'default'=>null,

            ],
            'deleted_at TIMESTAMP NULL DEFAULT NULL',
            'deleted_by'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'null'=>true,
'default'=>null,
                'constraint'        => 10,

            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');

        $this->forge->addForeignKey('created_by','users','id','CASCADE','NO ACTION');
        $this->forge->addForeignKey('updated_by','users','id','CASCADE','NO ACTION');
        $this->forge->addForeignKey('deleted_by','users','id','CASCADE','NO ACTION');

        // $forge->addForeignKey('users_id','users' 'id');

        $this->forge->createTable('users', TRUE);
        echo 'Database users created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('users', TRUE);
        echo 'Database users deleted!' . PHP_EOL;
    }
}
