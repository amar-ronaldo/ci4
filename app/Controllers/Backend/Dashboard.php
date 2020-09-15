<?php namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$this->response->page = true;
		$this->response->title = 'Dashboard';
	}
	public function widget_rtb()
	{
		$ret = '';
		$MemberBanksModel = model('MemberBanksModel');
		$KoinModel = model('KoinModel');
		foreach ($KoinModel->findAll() as $key => $value) {
			$ret .= '<div class="col-6 col-md-3 col-lg-6 col-xl-3">';
			$ret .= '	<a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">';
			$ret .= '		<div class="block-content block-content-full">';
			$ret .= '			<div class="font-size-sm font-w600 text-uppercase text-muted">Koin</div>';
			$ret .= '			<div class="font-size-h2 font-w400 text-dark money">' . $value['balance'] . '</div>';
			$ret .= '		</div>';
			$ret .= '	</a>';
			$ret .= '</div>';
		}
		foreach ($MemberBanksModel->findAll() as $key => $value) {
			$ret .= '<div class="col-6 col-md-3 col-lg-6 col-xl-3">';
			$ret .= '	<a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">';
			$ret .= '		<div class="block-content block-content-full">';
			$ret .= '			<div class="font-size-sm font-w600 text-uppercase text-muted">' . $value['name'] . '</div>';
			$ret .= '			<div class="font-size-h2 font-w400 text-dark money">' . $value['balance'] . '</div>';
			$ret .= '		</div>';
			$ret .= '	</a>';
			$ret .= '</div>';
		}
		return $ret;
	}
	public function widget_user()
	{
		$ret = '';
		$MemberBanksModel = model('MemberBanksModel');
		$KoinModel = model('KoinModel');
		foreach ($KoinModel->findAll() as $key => $value) {
			$ret .= '<div class="col-6 col-md-3 col-lg-6 col-xl-3">';
			$ret .= '	<a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">';
			$ret .= '		<div class="block-content block-content-full">';
			$ret .= '			<div class="font-size-sm font-w600 text-uppercase text-muted">Koin</div>';
			$ret .= '			<div class="font-size-h2 font-w400 text-dark money">' . $value['balance'] . '</div>';
			$ret .= '		</div>';
			$ret .= '	</a>';
			$ret .= '</div>';
		}
		foreach ($MemberBanksModel->findAll() as $key => $value) {
			$ret .= '<div class="col-6 col-md-3 col-lg-6 col-xl-3">';
			$ret .= '	<a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">';
			$ret .= '		<div class="block-content block-content-full">';
			$ret .= '			<div class="font-size-sm font-w600 text-uppercase text-muted">' . $value['name'] . '</div>';
			$ret .= '			<div class="font-size-h2 font-w400 text-dark money">' . $value['balance'] . '</div>';
			$ret .= '		</div>';
			$ret .= '	</a>';
			$ret .= '</div>';
		}
		return $ret;
	}
}
