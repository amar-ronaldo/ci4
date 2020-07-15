<?php namespace App\Database\Seeds;

class AllSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('UserGroupsSeeder');
        $this->call('UsersGroupsSeeder');

        $this->call('MenuTypesSeeder');
        $this->call('MenuSeeder');

        $this->call('MemberSeeder');
        $this->call('MemberBanksSeeder');
        $this->call('MembersBanksSeeder');
        $this->call('MemberSitesSeeder');
        $this->call('MembersSitesSeeder');
    }
}