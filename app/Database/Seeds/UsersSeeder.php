<?php namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        if($this->db->table('users')->truncate()){

            $data = [
                    'username' => 'amar',
                    'email'    => 'amar.ronaldo.m@gmail.com',
                    'password'=> password_hash("test", PASSWORD_DEFAULT)
            ];
    
    
            $this->db->query("INSERT INTO users (username, email,password) VALUES(:username:, :email:,:password:)",
                    $data
            );
    
            // Using Query Builder
            $this->db->table('users')->insert($data);
        }
    }
}