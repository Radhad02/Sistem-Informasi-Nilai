<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function Data_Mahasiswa(): string
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
