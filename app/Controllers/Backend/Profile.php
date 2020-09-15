<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

use App\Models\UserModel;
class Profile extends BaseController
{
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'Profile';
		
		$userModel = new UserModel();
		$user  = $userModel->find(session('id'));
		$this->response->data['user'] = $user;
	}
	public function edit($id)
	{
		$res = res_init();

		$userModel = new UserModel();

		$data = [
			'username' => $this->request->getPost('username'),
			'name' => $this->request->getPost('name'),
			'email'    => $this->request->getPost('email')
		];


		$avatar = $this->request->getFile('avatar');
		if ($this->validate->run($data,'profile')) {
			if ($avatar->isValid() == true) {
				if($this->validate->run($data,'file_avatar')){
					$avatar->move(UPLOAD_FOLDER . 'avatars');
					$data['avatar'] = $avatar->getName();
					
					$userModel->update($id, $data);
					res_success($res,'Berhasil Update Data');
				}else{
					res_error($res,$this->validate->getErrors());
					
				}	
			}else{
				$userModel->update($id, $data);
				
				res_success($res,'Berhasil Update Data');
			}			
		} else {
			res_error($res,$this->validate->getErrors());
		}
	}
	public function changePassword($id)
	{ 
		$res = res_init();
		$password = $this->request->getPost('current-password');
		$new_password = $this->request->getPost('new-password');

		$userModel = new UserModel();
		$user = $userModel->find($id);
		if ( !empty($user)) {
			if (password_verify($password,$user['password']) ) {
				$data = [
					'password'=> password_hash($new_password,PASSWORD_DEFAULT)
				];
				$userModel->update($id, $data);
				res_success($res,'Berhasil Update Password');
			}
		}
		res_error($res,'Gagal Update Password');
	}
}
