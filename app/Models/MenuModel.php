<?php namespace App\Models;
use CodeIgniter\Model;



class MenuModel extends Model
{
    protected $table      = 'menus';
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
        if (isset($data['data']['menu_parent'])){
            $data['data']['menu_id'] = $data['data']['menu_parent'];
            unset($data['data']['menu_parent']);
        }
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

    public function childMenu($datas = null)
    {
        $datas = $datas ?? $this->orderBy('order','ASC')->where('menu_id',null)->findAll();
        foreach ($datas as &$data) {
            if (is_null($data['menu_id'])) next($data);            
            $data['child'] = $this->orderBy('order','ASC')->where('menu_id', $data['id'])->findAll();
            $data['child'] = $this->childMenu($data['child']);
        }
        return $datas;
    }
}