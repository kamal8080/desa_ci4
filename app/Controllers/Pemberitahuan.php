<?php

namespace App\Controllers;
use App\Models\PemberitahuanModel;
use App\Models\KoetanModel;

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\Validation;

class Pemberitahuan extends BaseController
{
    protected $PemberitahuanModel;
    protected $validation;
    protected $KontakModel;

    public function __construct()

    {
        helper(['url', 'form']);
        $this->PemberitahuanModel = new PemberitahuanModel();
        $this->KontakModel = new KontakModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {           
        $PemberitahuanModel = new PemberitahuanModel();
        $data['data'] = $PemberitahuanModel->Get();
        $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        return view('themes/header')
            . view('PemberitahuanDanPengumuman', $data)
            . view('themes/footer', $kontak);
    }

    public function AdminPemberitahuan()
    {
        $PemberitahuanModel = new PemberitahuanModel();
        $data['data'] = $PemberitahuanModel->Get();
        echo view('admin/partials/navbar', )
            . view('admin/pemberitahuan/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }


    public function TambahData()
    {
    $PemberitahuanModel = new PemberitahuanModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'isi' => $this->request->getPost('isi'),
        ];

        $PemberitahuanModel->TambahData($data);
        return redirect()->to('/dashboard/pemberitahuan')->with('pesan', 'Data berhasil ditambahkan');

    }

    public function HapusData($id)
    {
        $PemberitahuanModel = new PemberitahuanModel();

        $data = [
            'id' => $id
        ];
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        $PemberitahuanModel->HapusData($data);
        return redirect()->to('/dashboard/pemberitahuan');
    }

    public function EditData($id)
    {
    $PemberitahuanModel = new PemberitahuanModel();
    $Pemberitahuan = $PemberitahuanModel->find($id);
    if ($Pemberitahuan) {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'isi' => $this->request->getPost('isi'),
        ];
        $PemberitahuanModel->update($id, $data);
        return redirect()->to('/dashboard/pemberitahuan')->with('pesan', 'Data Pemberitahuan berhasil diperbarui');
    } else {
        return redirect()->back()->with('pesan', 'Data Pemberitahuan gagal diperbarui');
    }
    }

}