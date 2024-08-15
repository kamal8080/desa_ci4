<?php

namespace App\Controllers;
use App\Models\KontakModel;

class Layanan extends BaseController
{
    protected $kontakModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->kontakModel = new KontakModel();

    }

    public function index()
    {   $kontakModel = new KontakModel();
        $kontak['kontak'] = $kontakModel->Get();
        return view('partials/header')
            . view('Layanan')
            . view('partials/footer', $kontak);

    }

}
