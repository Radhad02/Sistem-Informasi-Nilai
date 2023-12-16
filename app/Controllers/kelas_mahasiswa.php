<?php

namespace App\Controllers;

use App\Models\m_kelasM;
use App\Models\m_mahasiswa;

class kelas_mahasiswa extends BaseController
{

    protected $m_kelasM;
    protected $m_mahasiswa;
    public function __construct()
    {
        $this->m_kelasM = new m_kelasM();
    }

    public function Data_kelasM()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Kelas',
            'all' => $this->m_kelasM->All(),
            'data' => $this->m_kelasM->getId(),
            'currentPage' => $currentPage
        ];
        return view('/kelas_mahasiswa/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Kelas',
            'all' => $this->m_kelasM->All(),
            'datamahasiswa' => $this->m_kelasM->AllMahasiswa(),
            'datakelas' => $this->m_kelasM->AllKelas(),
            'datamatkul' => $this->m_kelasM->AllMatkul(),
            'datadosen' => $this->m_kelasM->AllDosen(),
        ];
        return view('/kelas_mahasiswa/input_kelas_mahasiswa', $data);
    }

    public function delete($id)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_kelasM->delete($id);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/kelas_mahasiswa/Data_kelasM');
    }


    //Fungsi Insert
    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_NIDN' => [
                // 'rules' => 'required|is_unique[mahasiswa_212395.212395_NIDN]|numeric',
                'errors' => [
                    'required' => 'Nim Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $data = [
            '212395_Id_Mahasiswa' => $this->request->getVar('212395_Id_Mahasiswa'),
            '212395_Id_Kelas' => $this->request->getVar('212395_Id_Kelas'),
            // '212395_Id_Matkul' => $this->request->getVar('212395_Id_Matkul'),
        ];
        $this->m_kelasM->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kelas_mahasiswa/Data_KelasM');
    }

    public function cari()
    {
        $users = new m_mahasiswa();
        $cari = $this->request->getGet('cari');
        $data = $users->where('212395_Nim', $cari)->findAll();
        return view('hasil_pencarian', compact('data'));
    }
}
