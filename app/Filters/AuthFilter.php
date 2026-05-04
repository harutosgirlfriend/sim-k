<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
         if (!session()->get('logged_in')) {
        return redirect()->to('/');
    }

    $role = session()->get('role');

 
    if ($arguments === null) {
        return;
    }

    if (!in_array($role, $arguments)) {
        return redirect()->to('/');
    }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}