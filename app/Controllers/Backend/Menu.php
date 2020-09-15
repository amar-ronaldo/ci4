<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;

use App\Models\MenuModel;
class Menu extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new MenuModel();
		$this->dataMaps = [
			'name' =>[],
			'controller' =>[],
			'icon' =>[],
		
		];

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'Menu Role';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['menus.id','menus.name','menus.created_at','menus.updated_at','menus.deleted_at','b.name as user_create','c.name as user_update','d.name as menu_id_name'],
			'join'=>[
				'users b' =>['menus.created_by = b.id'],
				'users c' =>['menus.updated_by = c.id'],
				'menus d' =>['menus.menu_id = d.id'],
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
		
		$data['menu_id'] = $this->request->getVar('menu_id');
		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');
			$this->response->ajax['message'] = 'Success edit data';
		}else{
			$this->response->ajax['message'] = 'Success tambah data';
		}

		$this->model->save($data);

		if ($this->model->affectedRows()) {
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
		$this->model->delete($id);
		
		if ($this->model->affectedRows()) {
			$this->response->ajax['success'] = 'true';
			$this->response->ajax['message'] = 'Berhasil menghapus data';
		}else{
			$this->response->ajax['error'] = 'true';
			$this->response->ajax['message'] = 'Proses gagal, hubungi admin untuk lebih lanjut';
		}
	}
	public function menu_get(){
		$html ='';
		foreach ($this->model->childMenu() as $menu1) {
			$html .='<div class="list-group nested-sortable text-white bg-modern">';
			$html .=	'<div class="list-group-item " data-id="'.$menu1['id'].'" data-menu_id="'.$menu1['menu_id'].'">';
			$html .=		'<div class="d-flex w-100 justify-content-between">'.$menu1['name'];
			$html .=			'<span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>';
			$html .=		'</div>';

			$html .=		'<div class="list-group nested-sortable bg-city">';
			if ($menu1['child']) {				
				foreach ($menu1['child'] as $menu2) {
					$html .='<div class="list-group-item " data-id="'.$menu2['id'].'" data-menu_id="'.$menu2['menu_id'].'">';
					$html .=	'<div class="d-flex w-100 justify-content-between">'.$menu2['name'];
					$html .=		'<span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>';
					$html .=	'</div>';
					$html .=	'<div class="list-group nested-sortable bg-warning">';
					if ($menu2['child']) {			
						foreach ($menu2['child'] as $menu3) {
							
						$html .='<div class="list-group-item " data-id="'.$menu3['id'].'" data-menu_id="'.$menu3['menu_id'].'">';
						$html .=	'<div class="d-flex w-100 justify-content-between">'.$menu3['name'];
						$html .=		'<span class="text-right"><i class="fa fa-edit mr-2"> </i><i class="fa fa-trash"> </i></span>';
						$html .=	'</div>';
						$html .='</div>';
						}
					}
					$html .=	'</div>';
					$html .='</div>';
				}
			}
			$html .=		'</div>';
			$html .=	'</div>';
			$html .='</div>';
			
		}
			
		return $html;
	}
	public function update_menu()
	{
		$data = $_POST['data'];
		for ($i=0; $i < 3; $i++) { 
			foreach ($data as &$d) {
				if (empty($d['menu_id'])) {
					unset($d['menu_id']);
				}
				if (isset($d['list'])) {
					$data = array_merge($data,$d['list']);
					unset($d['list']);
				}
			}
		}
		$this->model->updateBatch($data,'id');
		
	}
	public function find($id)
	{
		$data = $this->model->find($id);
		$data['menu_id_name'] = $this->model->find($data['menu_id'])['name'] ?? null;
		echo json_encode($data);
	}
	public function select2(){
		$response = [];
		$search = $this->request->getGet('q');
		$page = $this->request->getGet('page');
		
		$data = $this->model;
		if ($search) {
			$data->like('name',$search);
		}
		foreach ($data->orderBy('order','asc')->findAll(10,$page ?? 0) as $d) {
				$response['results'][] = [
					'id' => $d['id'],
					'text' => $d['name']
				];
		}
		echo json_encode($response);
	}

}
