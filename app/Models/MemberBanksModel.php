<?php namespace App\Models;
use CodeIgniter\Model;



class MemberBanksModel extends Model
{
    protected $table      = 'member_banks';
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
    public function pindahDana(array $data)
    {
        $this->plusBalance($data['member_sites_second_id'],$data['balance_pindah_dana']);
        $this->minusBalance($data['id'],$data['balance_pindah_dana']);

        return ;
    }
    public function plusBalance($id,$balance)
    {
        $db = $this->builder();
        $db->set('balance', 'balance+'.parse_int($balance), FALSE);
        $db->where('id', $id);
        $db->update(); // gives UPDATE mytable SET field = field+1 WHERE id = 2
        return ;
    }
    public function minusBalance($id,$balance)
    {
        $db = $this->builder();
        $db->set('balance', 'balance-'.parse_int($balance), FALSE);
        $db->where('id', $id);
        $db->update(); // gives UPDATE mytable SET field = field+1 WHERE id = 2
        return ;
    }
}