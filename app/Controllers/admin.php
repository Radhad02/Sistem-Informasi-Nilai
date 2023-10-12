<?php

namespace App\Controllers;

class admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda Utama'
        ];
        return view('admin/index', $data);
    }
}
