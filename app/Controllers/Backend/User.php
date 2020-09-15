<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\RoleModel;

class User extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct()
	{
		$this->model = new UserModel();
		$roleModel = new RoleModel();
		$this->dataMaps = [
			'name'=>[
				'placeholder'=>'nama',
				'label'=>'nama'
			],
			'username'=>[],
			'email'=>[],
			'role' =>[
				'placeholder'=>'Role',
				'label'=>'Role',
				'type'=>'select',
				'data' => $roleModel->findAll()
			],
			'password'=>[]
		];
	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'User';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}

	public function record()
	{
		$this->response->json = true;
		$data = record_filtered($this->model, [
			'column' => ['users.id', 'users.username', 'users.name','users.email', 'users.created_at', 'users.updated_at', 'users.deleted_at',
						 'b.name as user_create', 'c.name as user_update','e.name as role'],
			'join' => [
				'users b' => ['b.id = users.created_by'],
				'users c' => ['c.id = users.updated_by'],
				'users_groups d' => ['d.user_id = users.id'],
				'user_groups e' => ['e.id = d.user_group_id'],
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

		$success = $this->model->save($data);
		if ($success) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['redirect'] = 'single-crud';
		} else {
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}


	public function delete()
	{
		$this->response->json = true;
		$id = $this->request->getPost('id');
		$success = $this->model->delete($id);

		if ($success) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['message'] = 'Berhasil menghapus data';
		} else {
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}
}
