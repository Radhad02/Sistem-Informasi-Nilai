<?php

namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_mahasiswa;
use App\Models\m_dosen;
use App\Models\m_matkul;
use App\Models\m_kelas;
use App\Models\m_kelasM;
use App\Models\m_user;

class Coba extends BaseController
{
    public function nama_metode()
    {
        // Mendapatkan data yang dikirimkan dari view
        $nama = $this->request->getPost('nama');
        $umur = $this->request->getPost('umur');
        $pekerjaan = $this->request->getPost('pekerjaan');

        // Misalnya, kirim respons JSON
        return $this->response->setJSON([
            'nama' => $nama,
            'umur' => $umur,
            'pekerjaan' => $pekerjaan,
        ]);
    }
}
