<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;

class Mahasiswa extends BaseController
{
    protected $m_mahasiswa;
    public function __construct()
    {
        $this->m_mahasiswa = new m_mahasiswa();
    }

    public function Data_Mahasiswa()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Mahasiswa',
            'datamahasiswa' => $this->m_mahasiswa->getId(),
            'datamahasiswa' => $this->m_mahasiswa->paginate(10, 'mahasiswa_212395'),
            'pager' => $this->m_mahasiswa->pager,
            'currentPage' => $currentPage
        ];
        return view('mahasiswa/index', $data);
    }

    public function input()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Input Data Mahasiswa'
        ];
        return view('mahasiswa/input', $data);
    }

    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Nim' => [
                //'rules' => 'required|is_unique[mahasiswa_212395.212395_Nim]|numeric',
                'errors' => [
                    'required' => 'Nim Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        // if(!$this->validate($m_user->getValidationRules())){
        // 	session()->setFlashdata('errors',$this->validator->listErrors());
        // 	return redirect()->back();
        // }
        $this->m_mahasiswa->save([
            '212395_Nim' => $this->request->getVar('212395_Nim'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_Jkl' => $this->request->getVar('212395_Jkl'),
            '212395_Jurusan' => $this->request->getVar('212395_Jurusan'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/mahasiswa/Data_Mahasiswa');
    }
}
