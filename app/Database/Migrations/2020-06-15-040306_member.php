<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Members extends Migration
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
            'phone' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,

            ],
            'Yahoo_message' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,

            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,

            ],
            'note' => [
                'type'              => 'text',

            ],
            'created_at' => [
                'type'              => 'TIMESTAMP',
            ],
            'created_by' => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null' => true,
            ],
            'updated_at' => [
                'type'              => 'TIMESTAMP',
            ],
            'updated_by' => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null' => true,
            ],
            'deleted_at' => [
                'type'              => 'TIMESTAMP',
            ],
            'deleted_by' => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null'              => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('deleted_by', 'users', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('members', TRUE);
        echo 'Database members created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('members', TRUE);
        echo 'Database members deleted!' . PHP_EOL;
    }
}
