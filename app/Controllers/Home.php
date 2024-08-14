<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('partials/header')
            . view('partials/slide-show')
            . view('profil')
            . view('layanan')
            . view('BeritaDanPengumuman')
            . view('KependudukanDanFasilitasDesa')
            . view('kontak')
            . view('partials/footer' );
    }
}
