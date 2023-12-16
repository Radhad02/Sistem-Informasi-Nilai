<?php

namespace App\Controllers;

use App\Models\m_user;

class user extends BaseController
{
    protected $m_user;
    public function __construct()
    {
        $this->m_user = new m_user();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda Utama'
        ];
        return view('admin/index', $data);
    }

    public function Data_User()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Admin',
            'datauser' => $this->m_user->getUsers(),
            'pager' => $this->m_user->pager,
            'currentPage' => $currentPage
        ];
        return view('/user/index', $data);
    }

    public function input()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Input Data User',
        ];
        return view('/user/input', $data);
    }

    public function delete($iduser)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_user->delete($iduser);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/user/Data_User');
    }

    public function edit($iduser)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'datauser' => $this->m_user->getUsers($iduser)
        ];
        return view('/user/edit', $data);
    }

    //Fungsi Update
    public function update($iduser)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Nama' => [
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
        $this->m_user->update($iduser, [
            '212395_Username' => $this->request->getVar('212395_Username'),
            '212395_Pass' => $this->request->getVar('212395_Pass'),
            '212395_Level' => $this->request->getVar('212395_Level'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/user/Data_User');
    }

    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Kode_Admin' => [
                //'rules' => 'required|is_unique[admin_212395.212395_Kode_Admin]',
                'errors' => [
                    'required' => 'Kode Harus Diisi.',
                    'is_unique' => 'Kode Sudah Terdaftar.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $data = [
            '212395_Username' => $this->request->getVar('212395_Username'),
            '212395_Pass' => $this->request->getVar('212395_Pass'),
            '212395_Level' => $this->request->getVar('212395_Level'),
        ];
        $this->m_user->insertData($data);

        return redirect()->to('/user/Data_User');

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
    }
}
