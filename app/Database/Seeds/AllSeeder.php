<?php namespace App\Database\Seeds;

class AllSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('UserGroupsSeeder');
    }
}