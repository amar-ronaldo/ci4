<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',

	];

	public $profile = [
		'username'     => 'required',
		'name'    	   => 'required',
		'email'        => 'required|valid_email',
	];
	public $change_password = [
		'username'     => 'required',
		'name'    	   => 'required',
		'email'        => 'required|valid_email',
	];
	public $file_avatar = [
		'avatar'       => 'uploaded[avatar]|max_size[avatar,5024]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]',
	];


	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
