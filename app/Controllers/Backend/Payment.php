<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\MemberBanksModel;
class payment extends BaseController
{
	protected $model;
	protected $dataMaps;
	function __construct(){
		$this->model = new MemberBanksModel();
		$this->dataMaps = [
			'name' =>[],
		];

	}
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'Payment';
		$this->response->data['dataMaps'] = $this->dataMaps;
	}
	
	public function record(){
		$this->response->json = true;
		$data = record_filtered($this->model,[
			'column'=>['member_banks.id','member_banks.name','member_banks.balance','member_banks.created_at','member_banks.updated_at','member_banks.deleted_at','b.name as user_create','c.name as user_update'],
			'join'=>[
				'users b' =>['member_banks.created_by = b.id'],
				'users c' =>['member_banks.updated_by = c.id']
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
		$BankTransactionModel = model('BankTransactionModel');
		$this->response->json = true;
		$data = [];
		foreach ($this->dataMaps as $k_dataMap => $v_dataMap) {
			$data[$k_dataMap] = $this->request->getVar($k_dataMap);
		}
		$data['balance'] = parse_int( $this->request->getVar('balance'));
	
		if ($this->request->getVar('id')) {
			$data['id'] = $this->request->getVar('id');

			$balance_pindah_dana = $this->request->getVar('balance_pindah_dana');
			
			$this->response->ajax['message'] = 'Success edit data';
			$q= $this->model->find($data['id']);
			if ($q['balance'] != $data['balance']){
				$this->model->save($data);
				$BankTransactionModel->ubahDana($this->request->getPost());
			}
			if ($balance_pindah_dana) {
				$this->model->pindahDana($this->request->getPost());
				$BankTransactionModel->pindahDana($this->request->getPost());
			}
		}else{
			$this->response->ajax['message'] = 'Success tambah data';
			$this->model->save($data);
		}


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
