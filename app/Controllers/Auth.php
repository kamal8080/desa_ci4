<?php

namespace App\Controllers;
use App\Models\AuthModel;

class Auth extends BaseController
{   
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {   
        
        $data = array(
        'title' => 'Login',
        );
        return view('Auth/login');
    }

    public function register()
    {
    
        return view('Auth/register');
    }

    public function cek_login()
    {
        if ($this->validate([
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => ' {field} harus diisi.',
                    'valid_email' => ' email tidak valid.'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => ' {field} harus diisi.'
                ]
            ],
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->AuthModel->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama', $cek['nama']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('level', $cek['level']);

                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Login Gagal!!, Silahkan Cek Email Dan Password');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('pesan', 'Login Gagal!!, Silahkan Cek Email Dan Password');
            return redirect()->to(base_url('login'));
        }
    }

}