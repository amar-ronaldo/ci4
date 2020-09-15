<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\KoinModel;

use function PHPSTORM_META\type;

class Koin extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new KoinModel();
		$this->dataMaps = [
			'balance' =>[
				'type'=>'money'
			],
		];

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'koin';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['koin.id','koin.balance','koin.created_at','koin.updated_at','koin.deleted_at','b.name as user_create','c.name as user_update'],
			'join'=>[
				'users b' =>['koin.created_by = b.id'],
				'users c' =>['koin.updated_by = c.id']
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
		
	public function select2_koin(){
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');
		
		$datas = model('koinModel');
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
