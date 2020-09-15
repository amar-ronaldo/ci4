<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserRoleModel;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $protectFields = false;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert  = ['beforeInsertUpdate'];
    protected $afterInsert   = ['afterInsertUpdate'];

    protected $beforeUpdate  = ['beforeInsertUpdate'];
    protected $afterUpdate   = ['afterInsertUpdate'];

    protected $beforeDelete  = [];
    protected $afterDelete  = ['afterDelete'];

    protected $role_id = 0;
    
    protected function beforeInsertUpdate(array $data)
    {
        
        if (isset($data['data']['role'])) {
            $this->role_id = $data['data']['role'];
            unset($data['data']['role']);
        }

        if ($data['data']['password'] != '') {
            $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
        }else{
            unset($data['data']['password']);
        }

        $date = dateTime_now();
        if (!isset($data['data']['id'])){
            $data['data']['created_by'] = session('id') ?? null;
        }else{
            $data['data']['updated_at'] = $date;
            $data['data']['updated_by'] = session('id') ?? null;

        }
    
        return $data;
    }
    protected function afterInsertUpdate(array $data){
        $id = $data['id'][0] ?? $data['id'];
        $role_id = $this->role_id;

        $role = new UserRoleModel();
        $exist = $role->where(['user_id'=>$id])->find();
        $data = [
            'user_id' => $id,
            'user_group_id'=>$role_id
        ];
        if (isset($exist[0]['id'])) {
            $data['id'] = $exist[0]['id'];
        }
        return $role->save($data);

    }
    protected function AfterDelete(array $data)
    {
        $this->update($data['id'][0], [
            'deleted_by' => session('id') ?? null
        ]);
    
        return $data;
    }
}