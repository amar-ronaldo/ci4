<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Database\Migrations\MembersSites;
use App\Models\MemberModel;
use App\Models\MemberSitesModel;

class Member extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct()
	{
		$this->model = new MemberModel();
		$this->dataMaps = [
			'name' => [],
			'phone' => [],
			'yahoo_message' => [
				'placeholder' => 'Yahoo message',
				'label' => 'Yahoo message'
			],
			'email' => [],
			'note' => [],
		];
	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'Member';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}

	public function record()
	{
		$this->response->json = true;
		$data = record_filtered($this->model, [
			'column' => [
				'members.id',
				'members.name',
				'members.phone',
				'members.yahoo_message',
				'members.email',
				'members.note',
				'members.created_at', 'members.updated_at', 'members.deleted_at', 'b.name as user_create', 'c.name as user_update'
			],
			'join' => [
				'users b' => ['members.created_by = b.id'],
				'users c' => ['members.updated_by = c.id']
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
		$this->response->json = true;
		$data = [];
		foreach ($this->dataMaps as $k_dataMap => $v_dataMap) {
			$data[$k_dataMap] = $this->request->getVar($k_dataMap);
		}

		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');
			$this->response->ajax['message'] = 'Success edit data';
		} else {
			$this->response->ajax['message'] = 'Success tambah data';
		}

		$this->model->save($data);

		if ($this->model->affectedRows()) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['redirect'] = 'single-crud';
		} else {
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}


		$member_id = $this->model->getInsertID();
		$member_id = $member_id == 0  ? $this->request->getVar('id') : $member_id;
		
		// site 
		$sites = $this->request->getVar('site');
		$sitesModel = model('MembersSitesModel');
		//  add 
		foreach ($sites['username'] as $key => $value) {
			if (empty($value)) {
				continue;
			}
			$data = [
				'member_site_id' => $sites['member_site_id'][$key],
				'username' => $sites['username'][$key],
				'note' => $sites['note'][$key],
			];
			if (!empty($sites['id'][$key])) {
				$data['id'] = $sites['id'][$key];
			} else {
				$data['member_id'] = $member_id;
			}
			$sitesModel->save($data);
		}
		// delete
		foreach (array_filter($sites['delete'], 'strlen') as $sites_id) {
			$sitesModel->delete($sites_id);
		}
		// end site


		// bank 
		$banks = $this->request->getVar('bank');
		$banksModel = model('MembersbanksModel');
		//  add 
		foreach ($banks['bank'] as $key => $value) {
			if (empty($value)) {
				continue;
			}
			$data = [
				'bank' => $banks['bank'][$key],
				'account_name' => $banks['account_name'][$key],
				'account_number' => $banks['account_number'][$key],
			];
			if (!empty($banks['id'][$key])) {
				$data['id'] = $banks['id'][$key];
			} else {
				$data['member_id'] = $member_id;
			}
			$banksModel->save($data);
		}
		// delete
		foreach (array_filter($banks['delete'], 'strlen') as $banks_id) {
			$banksModel->delete($banks_id);
		}
		// end bank

	
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
	public function select2_site()
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
}
