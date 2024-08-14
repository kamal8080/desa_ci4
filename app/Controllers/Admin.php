<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()

    {
        return view ('admin/partials/navbar')
            . view('admin/Dashboard')
            . view('admin/partials/sidebar')
            . view('admin/partials/footer');
    }    
}
