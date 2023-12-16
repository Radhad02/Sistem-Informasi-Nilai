<?php

namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_mahasiswa;
use App\Models\m_dosen;
use App\Models\m_matkul;
use App\Models\m_kelas;
use App\Models\m_kelasM;
use App\Models\m_user;

class admin extends BaseController
{
    protected $m_admin;
    protected $m_mahasiswa;
    protected $m_dosen;
    protected $m_matkul;
    protected $m_kelas;
    protected $m_kelasM;
    protected $m_user;
    public function __construct()
    {
        $this->m_admin = new m_admin();
        $this->m_mahasiswa = new m_mahasiswa();
        $this->m_dosen = new m_dosen();
        $this->m_matkul = new m_matkul();
        $this->m_kelas = new m_kelas();
        $this->m_kelasM = new m_kelasM();
        $this->m_user = new m_user();
    }

    public function index()
    {
        helper('fungsi');
        $data = [
            'title' => 'Dashboard',
            'mahasiswa' => $this->m_mahasiswa->countAllResults(),
            'dosen' => $this->m_dosen->countAllResults(),
            'admin' => $this->m_admin->countAllResults(),
            'matkul' => $this->m_matkul->countAllResults(),
            'kelas' => $this->m_kelas->countAllResults(),
            'user' => $this->m_user->countAllResults(),
            'kelasM' => $this->m_kelasM->countMahasiswaWithoutClass(),
        ];
        return view('admin/index', $data);
    }

    public function Data_Admin()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Admin',
            'dataadmin' => $this->m_admin->getId(),
            'pager' => $this->m_admin->pager,
            'currentPage' => $currentPage
        ];
        return view('/admin/Data_Admin', $data);
    }

    public function input()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Input Data mata Kuliah',
            'dosen' => $this->m_admin->getId()
        ];
        return view('/admin/input', $data);
    }

    public function delete($idadmin)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_admin->delete($idadmin);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/admin/Data_Admin');
    }

    public function edit($idadmin)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'dataadmin' => $this->m_admin->getId($idadmin)
        ];
        return view('/admin/edit', $data);
    }

    //Fungsi Update
    public function update($idadmin)
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
        $this->m_admin->save([
            '212395_Id' => $idadmin,
            '212395_Kode_Admin' => $this->request->getVar('212395_Kode_Admin'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Kontak' => $this->request->getVar('212395_Kontak'),
            '212395_Pass' => $this->request->getVar('212395_Pass'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/admin/Data_Admin');
    }

    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Kode_Admin' => [
                'rules' => 'required|is_unique[admin_212395.212395_Kode_Admin]',
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
            '212395_Kode_Admin' => $this->request->getVar('212395_Kode_Admin'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Kontak' => $this->request->getVar('212395_Kontak'),
            '212395_Pass' => $this->request->getVar('212395_Pass'),
        ];
        $this->m_admin->insertData($data);

        return redirect()->to('/admin/Data_Admin');

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
    }
}
