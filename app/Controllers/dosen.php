<?php

namespace App\Controllers;

use App\Models\m_dosen;
use App\Models\m_user;

class Dosen extends BaseController
{

    protected $m_dosen;
    protected $m_user;
    public function __construct()
    {
        $this->m_dosen = new m_dosen();
        $this->m_user = new m_user();
    }


    public function Data_Dosen()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Dosen',
            'datadosen' => $this->m_dosen->getId(),
            'datadosen' => $this->m_dosen->paginate(10, 'dosen_212395'),
            'pager' => $this->m_dosen->pager,
            'currentPage' => $currentPage
        ];
        return view('/dosen/index', $data);
    }

    // Fungsi Input Data
    public function input()
    {
        $data = [
            'title' => 'Input Data Mahasiswa'
        ];
        return view('/dosen/input', $data);
    }

    // Fungsi Hapus Data
    public function delete($iddosen)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_dosen->delete($iddosen);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/dosen/Data_Dosen');
    }

    //Fungsi Edit Data
    public function edit($iddosen)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Dosen',
            'validation' => \Config\Services::validation(),
            'datadosen' => $this->m_dosen->getId($iddosen)
        ];
        return view('/dosen/edit', $data);
    }

    //Fungsi Update Data
    public function update($iddosen)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_NIDN' => [
                'rules' => 'required|is_unique[mahasiswa_212395.212395_NIDN]|numeric',
                'errors' => [
                    'required' => 'NIDN Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka'
                ]
            ],
            '212395_Nama_Dosen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi.',
                ]
            ],
            '212395_Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi.',
                ]
            ],
            '212395_jkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Kelamin ',
                ]
            ],
            '212395_Kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak Harus Diisi.',
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        $this->m_dosen->save([
            '212395_Id' => $iddosen,
            '212395_NIDN' => $this->request->getVar('212395_NIDN'),
            '212395_Nama_Dosen' => $this->request->getVar('212395_Nama_Dosen'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_jkl' => $this->request->getVar('212395_jkl'),
            '212395_Kontak' => $this->request->getVar('212395_Kontak'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/dosen/Data_Dosen');
    }

    // Fungsi Simpan Data
    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_NIDN' => [
                'rules' => 'required|is_unique[dosen_212395.212395_NIDN]|numeric',
                'errors' => [
                    'required' => 'NIDN Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka'
                ]
            ],
            '212395_Nama_Dosen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi.',
                ]
            ],
            '212395_Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi.',
                ]
            ],
            '212395_jkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Kelamin ',
                ]
            ],
            '212395_Kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak Harus Diisi.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $this->m_dosen->save([
            '212395_NIDN' => $this->request->getVar('212395_NIDN'),
            '212395_Nama_Dosen' => $this->request->getVar('212395_Nama_Dosen'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_jkl' => $this->request->getVar('212395_jkl'),
            '212395_Kontak' => $this->request->getVar('212395_Kontak'),
        ]);

        $nidn = 'd' . $this->request->getVar('212395_NIDN');
        $level = 'dosen';

        $data = [
            '212395_Username' => $this->request->getVar('212395_Nama_Dosen'),
            '212395_Pass' => $nidn,
            '212395_Level' => $level,
            '212395_Nama' => $this->request->getVar('212395_Nama_Dosen')
        ];
        $this->m_user->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dosen/Data_Dosen');
    }
}
