<?php namespace App\Controllers\Backend;

use App\Models\UserModel;

class Profile extends BaseController
{
	public function index()
	{

		return view('backend/profile',[
			'title'=>'Profile'
		]);
	}

}
