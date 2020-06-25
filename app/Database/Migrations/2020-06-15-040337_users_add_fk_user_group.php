<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersAddFKUserGroup extends Migration
{

    public function up()
    {
        $fields = [
            'user_group_id'         => [
                'type'              => 'INT',
                'unsigned'          => TRUE,
                'constraint'        => 10,
                'null'=>true,
                'after' => 'email'

            ],
        ];
        // $this->forge->addForeignKey('user_group_id','user_groups','id','CASCADE','NO ACTION');
        $this->forge->addColumn('users', $fields);
        $this->db->query('ALTER TABLE `users` ADD 	CONSTRAINT `users_user_group_id_foreign`FOREIGN KEY(`user_group_id`) REFERENCES `user_groups` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;');


        echo 'Database users add fk user_groups' . PHP_EOL;
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropForeignKey('users', 'users_user_group_id_foreign'); // to drop one single column
        $this->forge->dropColumn('users', 'user_group_id'); // to drop one single column
        echo 'Database users delete fk user_groups' . PHP_EOL;
    }
}
