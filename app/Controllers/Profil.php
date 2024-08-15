<?php

namespace App\Controllers;
use App\Models\ProfilModel;
use App\Models\KontakModel;

class Profil extends BaseController
{    
    protected $ProfilModel;
    protected $validation;
    protected $kontakModel;
    public function __construct()

    {
        helper(['url', 'form']);
        $this->ProfilModel = new ProfilModel();
        $this->kontakModel = new KontakModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {   
        $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        $profilModel = new ProfilModel();
        $profil['profil'] = $profilModel->Get();

    return view('partials/header')
    . view('Profil', $profil)
    . view('partials/footer', $kontak);
    }

    public function AdminProfil()
    {
        $profilModel = new ProfilModel();
        $data['title'] = 'Management Profil Desa';
        $data['data'] = $profilModel->Get();

        echo view('admin/partials/navbar')
            . view('admin/profil/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }

    public function EditData($id)
    {
    $profilModel = new profilModel();
    $gambar = $this->request->getFile('gambar_desa');
    $allowedExtensions = ['jpg', 'png', 'jpeg'];
    $desa = $profilModel->find($id);

    if ($desa) {
        $gambarBaru = $desa['gambar_desa'];
        if ($gambar && $gambar->isValid()) {
            $extension = $gambar->getExtension();
            if (in_array($extension, $allowedExtensions)) {
                $gambarBaru = $gambar->getName();
                $gambar->move(ROOTPATH . 'public/uploads/profil');
                        if (file_exists(ROOTPATH . 'public/uploads/profil/' . $desa['gambar_desa']) && is_file(ROOTPATH . 'public/uploads/profil/' . $desa['gambar_desa'])) {
                    unlink(ROOTPATH . 'public/uploads/profil/' . $desa['gambar_desa']);
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Format gambar tidak valid. Hanya jpg, png, dan jpeg yang diperbolehkan.');
            }
        }
        $misiInput = $this->request->getPost('misi');
        $misiInput = preg_replace('/,+/', ',', $misiInput); 
        $misiInput = str_replace(['\\', '"', '[', ']', '{', '}', ':', ',,', ','], '', $misiInput);
        $misiArray = explode("\n", $misiInput);
        $misiArray = array_map('trim', $misiArray);
        $misiArray = array_filter($misiArray, function($value) {
            return !empty($value) && $value !== ',';
        });
        $misiJSON = json_encode(array_values($misiArray));

        $data = [
            'nama_desa' => $this->request->getPost('nama_desa'),
            'tentang_desa' => $this->request->getPost('tentang_desa'),
            'visi' => $this->request->getPost('visi'),
            'misi' => $misiJSON,
            'gambar_desa' => $gambarBaru
        ];
        $profilModel->update($id, $data);
        return redirect()->to('/dashboard/profil')->with('pesan', 'Data Profil berhasil diperbarui');
    } else {
        return redirect()->back()->with('error', 'Data profil gagal diperbarui');
    }
}

}
