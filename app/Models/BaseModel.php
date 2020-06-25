<?php
namespace App\Models;
use CodeIgniter\Model;

class BaseModel extends Model
{
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
