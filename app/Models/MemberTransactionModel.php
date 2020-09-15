<?php namespace App\Models;
use CodeIgniter\Model;

use App\Models\MemberBanksModel;
use phpDocumentor\Reflection\Types\False_;
use PHPUnit\Framework\Constraint\IsEmpty;

class MemberTransactionModel extends Model
{
    protected $table      = 'members_transaction';
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
        $MemberBanksModel = new MemberBanksModel();
        $koinModel = new koinModel();
        if (isset($data['data']['withdraw'])) {
            $data['data']['withdraw'] = parse_int($data['data']['withdraw']);
        
        }
        if (isset($data['data']['deposit'])) {
            $data['data']['deposit'] = parse_int($data['data']['deposit']);
        
        }
        if (isset($data['data']['bonus'])) {
            $data['data']['bonus'] = parse_int($data['data']['bonus']);
        
        }
        if (isset($data['data']['cancel'])) {
            $data['data']['cancel'] = parse_int($data['data']['cancel']);
        
        }
        if (isset($data['data']['id'])){
            $edit = $this->find($data['data']['id']);
        }else{
            $edit = [
                'withdraw'=>0,
                'deposit'=>0,
                'bonus'=>0,
                'cancel'=>0,
            ];
        }
        
        if (!empty($data['data']['deposit']) || (empty($data['data']['deposit']) && !empty($data['data']['id'])) ) {
            $MemberBanksModel->plusBalance($data['data']['member_bank_id'],$data['data']['deposit']- $edit['deposit']);
            $koinModel->minusBalance($data['data']['deposit']- $edit['deposit']);
        }
        if (!empty($data['data']['withdraw']) || (empty($data['data']['withdraw']) && !empty($data['data']['id'])) ) {
            $MemberBanksModel->minusBalance($data['data']['member_bank_id'],$data['data']['withdraw'] -  $edit['withdraw']);
            $koinModel->plusBalance($data['data']['withdraw'] -  $edit['withdraw']);
        }
        if (!empty($data['data']['bonus']) || (empty($data['data']['bonus']) && !empty($data['data']['id'])) ) {
            $koinModel->minusBalance($data['data']['bonus'] - $edit['bonus']);
        }
        if (!empty($data['data']['cancel']) || (empty($data['data']['cancel']) && !empty($data['data']['id'])) ) {
            $koinModel->plusBalance($data['data']['cancel'] - $edit['cancel']);
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
    protected function AfterDelete(array $data)
    {
        $MemberBanksModel = new MemberBanksModel();
        $koinModel = new koinModel();
        $edit = $this->withDeleted()->find($data['id'][0]);
          if (!empty($edit['deposit'])) {
            $MemberBanksModel->minusBalance($edit['member_bank_id'],$edit['deposit']);
            $koinModel->plusBalance($edit['deposit']);
        }
        if (!empty($edit['withdraw'])) {
            $MemberBanksModel->plusBalance($edit['member_bank_id'],$edit['withdraw']);
            $koinModel->minusBalance($edit['withdraw']);
        }
        if (!empty($edit['bonus'])) {
            $koinModel->plusBalance($edit['bonus']);
        }
        if (!empty($edit['cancel'])) {
            $koinModel->minusBalance($edit['cancel']);
        }
        $this->update($data['id'][0], [
            'deleted_by' => session('id') ?? null
        ]);

        return $data;
    }
}