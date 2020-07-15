<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberBanks extends Migration
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


        $this->forge->createTable('member_banks', TRUE);
        echo 'Database member_banks created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('member_banks', TRUE);
        echo 'Database member_banks deleted!' . PHP_EOL;
    }
}
