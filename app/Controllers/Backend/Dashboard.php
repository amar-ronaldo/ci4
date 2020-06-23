<?php namespace App\Controllers\Backend;

use App\Models\AuthModel;
class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'title'=>lang("Login/page_name")
		];
		return view('backend/dashboard',$data);
	}

}
