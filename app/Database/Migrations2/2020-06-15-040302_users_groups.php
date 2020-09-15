<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersGroups extends Migration
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
            'user_id'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null' => true,
            ],
            'user_group_id'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'NO ACTION');
        // $this->forge->addForeignKey('user_group_id', 'user_groups', 'id', 'CASCADE', 'NO ACTION');


        $this->forge->createTable('users_groups', TRUE);
        echo 'Database users_groups created!' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('users_groups', TRUE);
        echo 'Database users_groups deleted!' . PHP_EOL;
    }
}
