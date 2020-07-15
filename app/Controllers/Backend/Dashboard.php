<?php namespace App\Controllers\Backend;

use App\Models\AuthModel;
class Dashboard extends BaseController
{
	public function index()
	{
		return view('backend/dashboard',[
			'title'=>'Dashboard'
		]);
	}

}
