<?php

namespace App\Controllers;

use App\Models\m_matkul;

class Matkul extends BaseController
{
    protected $m_matkul;
    public function __construct()
    {
        $this->m_matkul = new m_matkul();
    }


    public function Data_Matkul()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Mahasiswa',
            'datamatkul' => $this->m_matkul->allData(),
            'pager' => $this->m_matkul->pager,
            'currentPage' => $currentPage
        ];
        return view('/matkul/index', $data);
    }


    //Fungsi Input Data
    public function input()
    {
        $data = [
            'title' => 'Input Data mata Kuliah',
            'dosen' => $this->m_matkul->AllDosen()
        ];
        return view('/matkul/input', $data);
    }

    public function delete($idmatkul)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_matkul->delete($idmatkul);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/matkul/Data_Matkul');
    }


    //Fungsi Edit Data
    public function edit($idmatkul)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'data' => $this->m_matkul->find($idmatkul),
            'dosen' => $this->m_matkul->AllDosen()
        ];
        return view('matkul/edit', $data);
    }


    //Fungsi Update Data
    public function update($idmatkul)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        // $rules = [
        //     '212395_Kode' => [
        //         'rules' => 'required|is_unique[matakuliah_212395.212395_Kode]',
        //         'errors' => [
        //             'required' => 'Kode Harus Diisi.',
        //             'is_unique' => 'Nim Sudah Terdaftar.',
        //         ]
        //     ],
        //     '212395_SKS' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Pilih SKS',
        //         ]
        //     ],
        // ];

        // if (!$this->validate($rules)) {
        //     // session()->setFlashdata('errors',$this->validator->listErrors());
        //     return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        // }

        $this->m_matkul->update($idmatkul, [
            '212395_Kode' => $this->request->getVar('212395_Kode'),
            '212395_Nama_Matkul' => $this->request->getVar('212395_Matkul'),
            '212395_SKS' => $this->request->getVar('212395_SKS'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/matkul/Data_Matkul');
    }


    //Fungsi Simpan Data
    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Kode' => [
                'rules' => 'required|is_unique[matakuliah_212395.212395_Kode]',
                'errors' => [
                    'required' => 'Kode Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                ]
            ],
            '212395_SKS' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih SKS',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        // if(!$this->validate($m_user->getValidationRules())){
        // 	session()->setFlashdata('errors',$this->validator->listErrors());
        // 	return redirect()->back();
        // }
        $data = [
            '212395_Kode' => $this->request->getVar('212395_Kode'),
            '212395_Nama_Matkul' => $this->request->getVar('212395_Matkul'),
            '212395_SKS' => $this->request->getVar('212395_SKS'),
        ];
        $this->m_matkul->insertData($data);
        return redirect()->to('/matkul/Data_Matkul');

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
    }
}
