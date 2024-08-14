<?php

namespace App\Controllers;

class Kependudukan extends BaseController
{

    public function index()
    { 
        return view('partials/header')
            . view('KependudukanDanFasilitasDesa')
            . view('partials/footer');

    }
}

