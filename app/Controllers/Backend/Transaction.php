<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;

use App\Models\MemberTransactionModel;

class Transaction extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new MemberTransactionModel();

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'User Role';
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['members_transaction.id',
			'g.name as member',
			'f.name as site',
			'e.username',
			'members_transaction.reff',
			'members_transaction.reff',
			'members_transaction.transfer',
			'members_transaction.note_reff_transfer',
			'members_transaction.deposit',
			'members_transaction.withdraw',
			'members_transaction.note_deposit_withdraw',
			'members_transaction.bonus',
			'members_transaction.cancel',
			'members_transaction.note_bonus_cancel',
			'members_transaction.member_bank_id',
			'd.name as member_bank_id_name',
			'members_transaction.members_sites_id',
			'concat(e.username," | ",f.name, " | " ,g.name) as members_sites_id_name',
			'd.name as payment',
			'members_transaction.created_at','members_transaction.updated_at','members_transaction.deleted_at','b.name as user_create','c.name as user_update'],
			'join'=>[
				'users b' =>['members_transaction.created_by = b.id'],
				'users c' =>['members_transaction.updated_by = c.id'],
				'member_banks d' =>['members_transaction.member_bank_id = d.id'],
				'members_sites e' =>['members_transaction.members_sites_id = e.id'],
				'member_sites f' =>['e.member_site_id = f.id'],
				'members g' =>['e.member_id = g.id']
			]
		]);
		$this->response->ajax = [
			'success'=> 'true',
			'data' => $data['list'],
			'recordsTotal' =>$data['total'],
			'recordsFiltered' =>$data['totalFiltered']
		];
		
	}

	public function add()
	{
		$model = model('MemberTransactionModel');
		$this->response->json = true;
		$data = [
				'members_sites_id'=>$this->request->getPost('members_sites_id'),
				'reff'=>$this->request->getPost('reff'),
				'transfer'=>$this->request->getPost('transfer'),
				'note_reff_transfer'=>$this->request->getPost('note_reff_transfer'),
				'deposit'=>$this->request->getPost('deposit'),
				'withdraw'=>$this->request->getPost('withdraw'),
				'note_deposit_withdraw'=>$this->request->getPost('note_deposit_withdraw'),
				'bonus'=>$this->request->getPost('bonus'),
				'cancel'=>$this->request->getPost('cancel'),
				'note_bonus_cancel'=>$this->request->getPost('note_bonus_cancel'),
				'member_bank_id'=>$this->request->getPost('member_bank_id'),
		];

		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');
			$this->response->ajax['message'] = 'Success edit data';
		}else{
			$this->response->ajax['message'] = 'Success tambah data';
		}
		
		$model->save($data);
		
		if ($model->affectedRows()) {
			$this->response->ajax['redirect'] = 'single-crud';
			$this->response->ajax['success'] = 'true';
		}else{
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}
	

	public function delete()
	{
		$this->response->json = true;
		$id = $this->request->getPost('id');
		
		
		if ($this->model->delete($id)) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['message'] = 'Berhasil menghapus data';
		}else{
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}
	
	public function select2_member(){
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');
		
		$members = model('MembersSitesModel');
		if ($search) {
			$members->like('username',$search);
		}
		foreach ($members->findAll(10,$page ?? 0) as $member) {
			if (isset( $member['member']['name']) && isset($member['member_site']['name'])) {
				$response['results'][] = [
					'id' => $member['id'],
					'text' => $member['username'] . ' | '.  $member['member_site']['name']. ' | '.  $member['member']['name']
				];
			}
		}
		echo json_encode($response);
	}
	public function select2_bank(){
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');
		
		$members = model('MemberBanksModel');
		if ($search) {
			$members->like('name',$search);
		}
		foreach ($members->findAll(10,$page ?? 0) as $member) {
				$response['results'][] = [
					'id' => $member['id'],
					
					'text' => $member['name']
				];
		}
		echo json_encode($response);
	}
	
}
