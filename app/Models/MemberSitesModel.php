<?php namespace App\Models;
use CodeIgniter\Model;



class MemberSitesModel extends Model
{
    
    protected $table      = 'member_sites';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $protectFields = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert  = ['beforeInsertUpdate'];
    protected $afterInsert   = [];

    protected $beforeUpdate  = ['beforeInsertUpdate'];
    protected $afterUpdate   = [];

    protected $beforeDelete  = [];
    protected $afterDelete  = ['afterDelete'];
    
    protected function beforeInsertUpdate(array $data)
    {
        $date = dateTime_now();
        if (!isset($data['data']['id'])){
            $data['data']['created_by'] = session('id') ?? null;
        }else{
            $data['data']['updated_at'] = $date;
            $data['data']['updated_by'] = session('id') ?? null;

        }
    
        return $data;
    }
    protected function AfterDelete(array $data)
    {
        $this->update($data['id'][0], [
            'deleted_by' => session('id') ?? null
        ]);
    
        return $data;
    }
}