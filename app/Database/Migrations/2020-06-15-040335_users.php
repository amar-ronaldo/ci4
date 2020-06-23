<?php namespace App\Database\Migrations;

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
            'updated_at'         => [
                'type'              => 'TIMESTAMP',
			],
            'deleted_at'         => [
                'type'              => 'TIMESTAMP',
            ]
        ]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey('email');
		// $forge->addForeignKey('users_id','users','id');
		
		if ($this->forge->createTable('users',TRUE))
		{
			$this->seeder->call('UsersSeeder');
			echo 'Database users created!';
		}

	}

	//--------------------------------------------------------------------

	public function down()
	{
		if ($this->forge->dropTable('users',TRUE))
		{
			echo 'Database users deleted!';
		}
	}
}
