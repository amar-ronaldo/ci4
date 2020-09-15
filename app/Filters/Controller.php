<?php namespace App\Filters;

use CodeIgniter\CodeIgniter;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\URI;

class controller implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    { 
        // print_r($request);exit;
        
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if ($response->page ?? false) {
            $view_path = $response->isBackend   ?'backend' : 'frontend';
            $view_path .= '/page';
            $view_path .= '/'. ($response->isBackend ? $response->uri2  : $response->uri1);
            $view_path .= '/'. ($response->isBackend ? $response->uri3  : $response->uri2);

            $data  = [
                'title'=> $response->title,
                'titleDesc'=> $response->titleDesc,
            ];
            if (!empty($response->data)) {
                foreach ($response->data as $key => $value) {
                    $data[$key] = $value;
                }
            }
            echo view($view_path,$data);
        }

        if ($response->json ?? false) {
            $res = array_replace($response->ajaxDefault,$response->ajax);
            echo json_encode($res);exit;
        }
        
    }
}