<?php

namespace App\Controllers;

class Berita extends BaseController
{

    public function index()
    {   
        return view('partials/header')
            . view('BeritaDanPengumuman')
            . view('partials/footer');
    }


}