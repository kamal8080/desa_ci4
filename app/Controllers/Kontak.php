<?php

namespace App\Controllers;
use App\Models\KontakModel;

class Kontak extends BaseController
{
    protected $KontakModel;

    public function __construct()
    {
        $this->KontakModel = new KontakModel();
    }

    public function index()
    {
        return view('partials/header')
            . view('Kontak');
    }

    public function AdminKontak()
    {
        
        $KontakModel = new KontakModel();
        $data['title'] = 'Kotak Desa';
        $data['data'] = $KontakModel->Get();
        echo view('admin/partials/navbar', $data)
            . view('admin/kontak/index', $data)
            . view('admin/partials/sidebar', $data)
            . view('admin/partials/footer', $data);
    }

    public function EditData($id)
    {
        $KontakModel = new KontakModel();
        $desa = $KontakModel->find($id);
    
        if ($desa) {
            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'lokasi_map' => $this->request->getPost('lokasi_map')
            ];
            $KontakModel->update($id, $data);
            return redirect()->to('/dashboard/kontak')->with('pesan', 'Kontak desa berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Kontak desa gagal diperbarui');
        }
    }
}
