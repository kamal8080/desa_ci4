<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\PemberitahuanModel;
use App\Models\KontakModel;

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\Validation;

class Berita extends BaseController
{
    protected $kontakModel;
    protected $beritaModel;
    protected $pemberitahuanModel; 
    protected $validation;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->beritaModel = new BeritaModel();
        $this->pemberitahuanModel = new PemberitahuanModel();
        $this->kontakModel = new KontakModel();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {    
        $beritaModel = new BeritaModel();
        $berita['berita'] = $beritaModel->Get();
        $pemberitahuanModel = new PemberitahuanModel();
        $pemberitahuan['pemberitahuan'] = $pemberitahuanModel->Get();
        $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        $data = array_merge($berita, $pemberitahuan);
        return view('partials/header')
            . view('BeritaDanPengumuman', $data)
            . view('partials/footer', $kontak);
    }

    public function AdminBerita()
    {
        $beritaModel = new BeritaModel();
        $data['data'] = $beritaModel->Get();
        echo view('admin/partials/navbar')
            . view('admin/berita/index', $data)
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }

    public function TambahData()
{
    $beritaModel = new BeritaModel();
    $gambar = $this->request->getFile('gambar');
    $allowedExtensions = ['jpg', 'png', 'jpeg'];

    if ($gambar->isValid() && in_array($gambar->getExtension(), $allowedExtensions)) {
        $data = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'slug_berita' => url_title($this->request->getPost('slug_berita'), '-', true),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'gambar' => $gambar->getName()
        ];

        $gambar->move(ROOTPATH . 'public/uploads/berita');
        $beritaModel->TambahData($data);
        return redirect()->to('/dashboard/berita')->with('pesan', 'Data berhasil ditambahkan');
    } else {
        return redirect()->back()->withInput()->with('error', 'Format gambar tidak valid. Hanya jpg, png dan jpeg yang diperbolehkan.');
    }
}

    public function HapusData($id_berita)
{
    $beritaModel = new BeritaModel();
    $berita = $beritaModel->find($id_berita);

    if ($berita) {
        $gambar = $berita['gambar'];
        if (file_exists(ROOTPATH . 'public/uploads/berita/' . $gambar) && is_file(ROOTPATH . 'public/uploads/berita/' . $gambar)) {
            unlink(ROOTPATH . 'public/uploads/berita/' . $gambar);
        }
    }

    $data = [
        'id_berita' => $id_berita
    ];
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    $beritaModel->HapusData($data);
    return redirect()->to('/dashboard/berita');
}

    public function EditData($id_berita)
{
    $beritaModel = new BeritaModel();
    $gambar = $this->request->getFile('gambar');
    $allowedExtensions = ['jpg', 'png', 'jpeg'];
    $berita = $beritaModel->find($id_berita);

    if ($berita) {
        $gambarBaru = $berita['gambar'];
        if ($gambar && $gambar->isValid()) {
            $extension = $gambar->getExtension();
            if (in_array($extension, $allowedExtensions)) {
                $gambarBaru = $gambar->getName();
                $gambar->move(ROOTPATH . 'public/uploads/berita');
                if (file_exists(ROOTPATH . 'public/uploads/berita/' . $berita['gambar']) && is_file(ROOTPATH . 'public/uploads/berita/' . $berita['gambar'])) {
                    unlink(ROOTPATH . 'public/uploads/berita/' . $berita['gambar']);
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Format gambar tidak valid. Hanya jpg dan png yang diperbolehkan.');
            }
        }
        $data = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'slug_berita' => url_title($this->request->getPost('slug_berita'), '-', true),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'gambar' => $gambarBaru
        ];
        $beritaModel->update($id_berita, $data);
        return redirect()->to('/dashboard/berita')->with('pesan', 'Data berhasil diperbarui');
    } else {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}

}