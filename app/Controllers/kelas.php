<?php

namespace App\Controllers;

use App\Models\m_kelas;

class kelas extends BaseController
{

    protected $m_kelas;
    public function __construct()
    {
        $this->m_kelas = new m_kelas();
    }

    public function Data_kelas()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Kelas',
            'datakelas' => $this->m_kelas->allData(),
            'currentPage' => $currentPage
        ];
        return view('/kelas/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Kelas',
            'matkul' => $this->m_kelas->AllMatkul(),
            'dosen' => $this->m_kelas->AllDosen(),
            // 'dosen' => $this->m_kelas->AllDosen()
        ];
        return view('/kelas/input', $data);
    }

    public function delete($idkelas)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_kelas->delete($idkelas);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/kelas/Data_kelas');
    }

    public function edit($idkelas)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data kelas',
            'validation' => \Config\Services::validation(),
            'data' => $this->m_kelas->find($idkelas),
            'matkul' => $this->m_kelas->AllMatkul(),
            'dosen' => $this->m_kelas->AllDosen(),
            'mahasiswa' => $this->m_kelas->AllMahasiswa(),
        ];
        return view('/kelas/edit', $data);
    }

    //Fungsi Update
    public function update($idkelas)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Nama_kelas' => [
                //'rules' => 'required|min_length[10]|numeric',
                'errors' => [
                    'required' => 'Nama Harus Diisi.',
                    'min_length' => 'Nama minimal 10 Angka',
                    'numeric' => 'Wajib Angka'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $this->m_kelas->update($idkelas, [
            '212395_Kode' => $this->request->getVar('212395_Kode'),
            '212395_Ruangan' => $this->request->getVar('212395_Ruangan'),
            '212395_Id_Matkul' => $this->request->getVar('212395_Id_Matkul'),
            '212395_Id_Dosen' => $this->request->getVar('212395_Id_Dosen'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/kelas/Data_kelas');
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
            '212395_Kode' => $this->request->getVar('212395_Kode'),
            '212395_Ruangan' => $this->request->getVar('212395_Ruangan'),
            '212395_Id_Matkul' => $this->request->getVar('212395_Id_Matkul'),
            '212395_Id_Dosen' => $this->request->getVar('212395_Id_Dosen'),
        ];
        $this->m_kelas->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kelas/Data_kelas');
    }
}
