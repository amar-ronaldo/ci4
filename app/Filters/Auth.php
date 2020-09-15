<?php namespace App\Filters;

use CodeIgniter\CodeIgniter;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $isLogin = empty(session('username'));
        $backend = $request->uri->getSegment(1) == 'backend';
        $logout = $request->uri->getSegment(1) == 'logout';

        if ($isLogin && $backend && !$logout ) {
            return redirect('login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}