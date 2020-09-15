<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;

use App\Models\RoleModel;
class Role extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new RoleModel();
		$this->dataMaps = [
			'name' =>[]
		];

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'User Role';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['user_groups.id','user_groups.name','user_groups.created_at','user_groups.updated_at','user_groups.deleted_at','b.name as user_create','c.name as user_update'],
			'join'=>[
				'users b' =>['user_groups.created_by = b.id'],
				'users c' =>['user_groups.updated_by = c.id']
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
		$this->response->json = true;
		$data = [];
		foreach ($this->dataMaps as $k_dataMap => $v_dataMap) {
			$data[$k_dataMap] = $this->request->getVar($k_dataMap);
		}
		
		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');
			$this->response->ajax['message'] = 'Success edit data';
		}else{
			$this->response->ajax['message'] = 'Success tambah data';
		}

		$this->model->save($data);

		if ($this->model->affectedRows()) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['redirect'] = 'single-crud';
		}else{
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
		}else{
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}
}
