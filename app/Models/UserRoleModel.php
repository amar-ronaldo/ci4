<?php namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table      = 'users_groups';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;
    protected $protectFields = false;

}