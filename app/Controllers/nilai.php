<?php

namespace App\Controllers;

class Nilai extends BaseController
{
    public function Data_Nilai(): string
    {
        $data = [
            'title' => 'Data Nilai'
        ];
        return view('/nilai/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Nilai'
        ];
        return view('/nilai/input', $data);
    }
}
