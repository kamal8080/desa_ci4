<?php

namespace App\Controllers;

class Kontak extends BaseController
{

    public function index()
    {
        return view('partials/header')
            . view('Kontak');
    }
}
