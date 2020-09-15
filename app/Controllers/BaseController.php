<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use CodeIgniter\HTTP\URI;


class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['Auth', 'General'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = session();
		$this->uri  = new URI(current_url());
		$this->validate  = \Config\Services::validation();

		$response->isBackend = $this->uri->getSegments()[0] == 'backend';
		$response->uri1 = $this->uri->getSegments()[0];
		$response->uri2  = $this->uri->getSegments()[1] ?? 'index';
		$response->uri3  = $this->uri->getSegments()[2] ?? 'index';

		$response->title  = '';
		$response->titleDesc  = '';
		$response->page = false;
		
		$response->json = false;
		$response->ajaxDefault = res_init();
		$response->ajax = [];
	}
}
