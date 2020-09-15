<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class Dataplayer extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct()
	{
		$this->model = new RoleModel();
		$this->dataMaps = [
			'name' => []
		];
	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'User Role';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}

	public function record()
	{
		$this->response->json = true;
		$data = record_filtered($this->model, [
			'column' => ['user_groups.id', 'user_groups.name', 'user_groups.created_at', 'user_groups.updated_at', 'user_groups.deleted_at', 'b.name as user_create', 'c.name as user_update'],
			'join' => [
				'users b' => ['user_groups.created_by = b.id'],
				'users c' => ['user_groups.updated_by = c.id']
			]
		]);
		$this->response->ajax = [
			'success' => 'true',
			'data' => $data['list'],
			'recordsTotal' => $data['total'],
			'recordsFiltered' => $data['totalFiltered']
		];
	}

	public function add()
	{
		$model = model('MemberTransactionModel');
		$this->response->json = true;
		$data = [
			'id' => $this->request->getPost('id'),
			'members_sites_id' => $this->request->getPost('members_sites_id'),
			'reff' => $this->request->getPost('reff'),
			'transfer' => $this->request->getPost('transfer'),
			'note_reff_transfer' => $this->request->getPost('note_reff_transfer'),
			'deposit' => $this->request->getPost('deposit'),
			'withdraw' => $this->request->getPost('withdraw'),
			'note_deposit_withdraw' => $this->request->getPost('note_deposit_withdraw'),
			'bonus' => $this->request->getPost('bonus'),
			'cancel' => $this->request->getPost('cancel'),
			'note_bonus_cancel' => $this->request->getPost('note_bonus_cancel'),
			'member_bank_id' => $this->request->getPost('member_bank_id'),
		];

		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');
			$this->response->ajax['message'] = 'Success edit data';
		} else {
			$this->response->ajax['message'] = 'Success tambah data';
		}

		$model->save($data);

		if ($model->affectedRows()) {
			$this->response->ajax['success'] = 'true';
		} else {
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}


	public function delete()
	{
		$this->response->json = true;
		$id = $this->request->getPost('id');
		$this->model->delete($id);

		if ($this->model->affectedRows()) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['message'] = 'Berhasil menghapus data';
		} else {
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}

	public function select2_member()
	{
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');

		$members = model('MembersSitesModel');
		if ($search) {
			$members->like('username', $search);
		}
		foreach ($members = $members->findAll(10, $page ?? 0) as $member) {
			if (isset($member['member']['name']) && isset($member['member_site']['name'])) {
				$response['results'][] = [
					'id' => $member['id'],
					'text' => $member['username'] . ' | ' .  $member['member_site']['name'] . ' | ' .  $member['member']['name']
				];
			}
		}
		echo json_encode($response);
	}
	public function select2_bank()
	{
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');

		$members = model('MemberBanksModel');
		if ($search) {
			$members->like('name', $search);
		}
		foreach ($members->findAll(10, $page ?? 0) as $member) {
			$response['results'][] = [
				'id' => $member['id'],
				'text' => $member['name']
			];
		}
		echo json_encode($response);
	}
	public function select2_member_site()
	{
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');

		$members = model('MemberSitesModel');
		if ($search) {
			$members->like('name', $search);
		}
		foreach ($members->findAll(10, $page ?? 0) as $member) {
			$response['results'][] = [
				'id' => $member['id'],
				'text' => $member['name']
			];
		}
		echo json_encode($response);
	}
	public function site_member()
	{
		$site = model('MembersSitesModel');
		$id = $this->request->getVar('id');
		$data = $site->where(['member_id' => $id])->findAll();
		return json_encode($data);
	}
	public function bank_member()
	{
		$site = model('MembersbanksModel');
		$id = $this->request->getVar('id');
		$data = $site->where(['member_id' => $id])->findAll();
		return json_encode($data);
	}
	public function select2_payment(){
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');
		
		$datas = model('PaymentModel');
		if ($search) {
			$datas->like('name',$search);
		}
		foreach ($datas->findAll(10,$page ?? 0) as $data) {
			$response['results'][] = [
				'id' => $data['id'],
				'text' => $data['name']
			];
		}
		echo json_encode($response);
	}
}
