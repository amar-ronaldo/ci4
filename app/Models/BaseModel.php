<?php
namespace App\Models;
use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $session;
    public function __construct(){
        $this->session = \Config\Services::session();
        parent::__construct();

    }
    public function getData($where = false)
    {
        if ($where === false)
        {
            return $this->findAll();
        }
    
        return $this->asArray()
                    ->where($where)
                    ->first();
    }
}
