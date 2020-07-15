<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Login extends BaseController
{
	protected $AuthModel;

	public function __construct()
	{
		$this->AuthModel = new AuthModel();
	}

	public function SignIn()
	{
		return view('frontend/login/sign_in',[
			'title'=> lang('Signin.page_name')
			]
		);
	}

	public function SignInProccess()
	{
		$this->session->setFlashdata('error', 'Username atau Password Salah');
		if (empty($_POST)) {
			return redirect()->to(base_url('login'));
		}
		$username = $_POST['login-username'];
		$password = $_POST['login-password'];

		$user = $this->AuthModel->where('username', $username)->first();
		if (!password_verify($password, $user['password'] ?? '') || !$user) {
			$this->session->setFlashdata('error', 'Username atau Password Salah');
			return redirect()->to(base_url('login'));
		}
		unset($this->session->error);

		$this->DoLogin($user);
		return redirect()->to(base_url('backend/dashboard'));
	}

	private function DoLogin($user = null)
	{
		$this->session->set([
			'id' => $user['id'],
			'username' => $user['username'],
			'email' => $user['email'],
			'avatar' => $user['avatar'],
		]);
	}

	public function ForgetPassword()
	{
		return view('frontend/login/forget_password',[
			'title'=> lang('ForgetPassword.page_name')
			]
		);
	}

	public function ForgetPasswordProccess()
	{
	}
	public function SignOut()
	{
		$this->session->destroy();
		$this->session->setFlashdata('success', 'berhasil logout');

		return redirect()->to(base_url('login'));
	}
	//--------------------------------------------------------------------

}
