<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
    {
        // BELUM LOGIN
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        // AMBIL ROLE
        $role = session()->get('role');

        // CEK ROLE
        if ($arguments) {

            if (!in_array($role, $arguments)) {

                return redirect()->to('/')
                    ->with('error', 'Akses ditolak');
            }
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        //
    }

}