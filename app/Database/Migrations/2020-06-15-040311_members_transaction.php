<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MembersTransaction extends Migration
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
            'reff' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,

            ],
            'transfer' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'note_reff_tranfer' => [
                'type'              => 'text',

            ],
            'deposit' => [
                'type'              => 'INT',
                'constraint'        => 10,

            ],
            'withdraw' => [
                'type'              => 'INT',
                'constraint'        => 10,
            ],
            'note_deposit_withdraw' => [
                'type'              => 'text',

            ],
            'bonus' => [
                'type'              => 'INT',
                'constraint'        => 10,

            ],
            'cancel' => [
                'type'              => 'INT',
                'constraint'        => 10,
            ],
            'note_bonus_cancel' => [
                'type'              => 'text',
            ],
            'note_bonus_cancel' => [
                'type'              => 'text',
            ],
            
            'member_bank_id' => [
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
            'members_banks_id' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'unsigned'          => 'true',

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

        $this->forge->addForeignKey('member_bank_id', 'members_banks', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('deleted_by', 'users', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('members_transaction', TRUE);
        echo 'Database members_transaction created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('members_transaction', TRUE);
        echo 'Database members_transaction deleted!' . PHP_EOL;
    }
}
