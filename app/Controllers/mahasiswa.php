<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Data Mahasiswa'
        ];
        return view('mahasiswa/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Mahasiswa'
        ];
        return view('mahasiswa/input', $data);
    }
}
