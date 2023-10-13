<?php

namespace App\Controllers;

class Dosen extends BaseController
{
    public function Data_Dosen(): string
    {
        $data = [
            'title' => 'Data Dosen'
        ];
        return view('/dosen/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Mahasiswa'
        ];
        return view('/dosen/input', $data);
    }
}
