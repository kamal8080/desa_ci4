<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('log')) {
            session()->setFlashdata('pesan', 'Silahkan login terlebih dahulu.');
            return redirect()->to('/login');
        }
    }
    

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()-> get('log') == true) {
            return redirect()->to('/dashboard');
        }	
    }
}