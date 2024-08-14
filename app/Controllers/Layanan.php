<?php

namespace App\Controllers;

class Layanan extends BaseController
{

    public function index()
    {
        return view('partials/header')
            . view('Layanan')
            . view('partials/footer');

    }

}
