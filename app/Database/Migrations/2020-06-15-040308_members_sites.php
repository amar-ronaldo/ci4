<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MembersSites extends Migration
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
            'member_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE

            ],
            'member_site_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => TRUE

            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,

            ],
            'note' => [
                'type'              => 'TEXT',

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

        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('member_site_id', 'member_sites', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('deleted_by', 'users', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('members_sites', TRUE);
        echo 'Database members_sites created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('members_sites', TRUE);
        echo 'Database members_sites deleted!' . PHP_EOL;
    }
}
