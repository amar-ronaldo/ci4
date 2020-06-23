<?php namespace App\Controllers;

use SebastianBergmann\CodeCoverage\Report\Text;

class Render extends BaseController
{
    var $render_type, $uri;

    function __construct(){
        $this->uri = service('uri');
        $this->render_type = $this->uri->getSegment(1) == 'backend' ? 2:1;
    }

	public function breadcrumb()
	{
        if($this->render_type == 2){
            return view('backend/partials/breadcrumb');
        }
    }
    
	public function meta_tag(string $title = '')
	{
        return view('frontend/partials/meta_tag',['title'=>$title]);
    }

	public function sidebar()
	{
        return view('frontend/partials/sidebar');
    }
    

}
