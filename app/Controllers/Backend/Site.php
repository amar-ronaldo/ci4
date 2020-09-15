<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;

use App\Models\SiteModel;
class Site extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new SiteModel();
		$this->dataMaps = [
			'name' =>[],
			'url' =>[],
		];

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'User Site';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['member_sites.id','member_sites.name','member_sites.url','member_sites.created_at','member_sites.updated_at','member_sites.deleted_at','b.name as user_create','c.name as user_update'],
			'join'=>[
				'users b' =>['member_sites.created_by = b.id'],
				'users c' =>['member_sites.updated_by = c.id']
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
