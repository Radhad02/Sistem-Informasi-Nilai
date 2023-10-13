<?php

namespace App\Controllers;

class Matkul extends BaseController
{
    public function Data_Matkul(): string
    {
        $data = [
            'title' => 'Data Mata Kuliah'
        ];
        return view('/matkul/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data mata Kuliah'
        ];
        return view('/matkul/input', $data);
    }
}
