<?php namespace App\Libraries\Backend;
use CodeIgniter\Controller;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Theme extends Controller
{
	protected $helpers = [];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
		$this->session = \Config\Services::session();

	}
	public function header()
	{
		return view('backend/partials/header');
	}
	public function sidebar()
	{
		return view('backend/partials/sidebar');
	}
	public function content_default()
	{
		return view('backend/partials/content_default');
	}
	public function footer()
	{
		return view('backend/partials/footer');
	}

}