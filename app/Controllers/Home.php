<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KependudukanModel;
use App\Models\ProfilModel;
use App\Models\KontakModel;
use App\Models\PemberitahuanModel;

class Home extends BaseController
{   
    protected $beritaModel;
    protected $profilModel;
    protected $kependudukanModel;
    protected $validation;
    protected $kontakModel;
    protected $pemberitahuanModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->beritaModel = new BeritaModel();
        $this->profilModel = new ProfilModel();
        $this->kontakModel = new KontakModel();
        $this->pemberitahuanModel = new PemberitahuanModel();
        $this->kependudukanModel = new KependudukanModel();
        $this->validation = \Config\Services::validation();
    }
    
    public function index(): string
    {
        $beritaModel = new BeritaModel();
        $berita['berita'] = $beritaModel->Get();
        $profilModel = new ProfilModel();
        $profil['profil'] = $profilModel->Get();
        $kependudukanModel = new KependudukanModel();
        $kependudukan['kependudukan'] = $kependudukanModel->Get();
        $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        $pemberitahuanModel = new PemberitahuanModel();
        $pemberitahuan['pemberitahuan'] = $pemberitahuanModel->Get();

        $data = array_merge($berita, $pemberitahuan);

        return view('partials/header')
            . view('partials/slide-show', $data)
            . view('profil', $profil)
            . view('layanan', $data)
            . view('BeritaDanPengumuman', $data)
            . view('KependudukanDanFasilitasDesa')
            . view('kontak', $kontak)
            . view('partials/footer',$kontak);
    }
}