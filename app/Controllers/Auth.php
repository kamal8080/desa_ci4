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

    public function save_registers()
    {
        if ($this->validate([
            'nama' => [
                'label' => 'nama',
                'rules' => 'required',
                'errors' => [
                    'required' => ' {field} harus diisi.'
                ]
            ],
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
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => ' {field} harus diisi.',
                    'min_length' => ' password minimal 8 karakter.'
                ]
            ],
            'repassword' => [
            'label' => 'repassword',
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => ' {field} harus diisi.',
                'matches' => ' password tidak sama .'
            ]
        ],
        ])) {
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => '3'
            );
            $this->AuthModel->save_register($data);
            session()->setFlashdata('success', 'Register Berhasil');
            return redirect()->to('login');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('register');
        }
    }

    public function save_register()
{
    if ($this->validate([
            'nama' => [
                'label' => 'nama',
                'rules' => 'required',
                'errors' => [
                    'required' => ' {field} harus diisi.'
                ]
            ],
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
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => ' {field} harus diisi.',
                    'min_length' => ' password minimal 8 karakter.'
                ]
            ],
            'repassword' => [
            'label' => 'repassword',
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => ' {field} harus diisi.',
                'matches' => ' password tidak sama.'
            ]
        ],
    ])) {
        $email = $this->request->getPost('email');
        if ($this->AuthModel->checkEmailExists($email)) {
            session()->setFlashdata('pesan', 'Email sudah terdaftar. Silahkan gunakan email lain.');
            return redirect()->to('register');
        }

        $data = array(
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => '3'
        );
        $this->AuthModel->save_register($data);
        session()->setFlashdata('success', 'Register Berhasil');
        return redirect()->to('login');
    } else {
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to('register');
    }
}

    public function logout()
    {   
        session()->destroy();
        session()->setFlashdata('pesan', 'Logout Berhasil');
        return redirect()->to('login');
    }

}