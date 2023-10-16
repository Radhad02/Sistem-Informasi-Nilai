<?php

namespace App\Controllers;

use App\Models\m_dosen;

class Dosen extends BaseController
{
    protected $m_dosen;
    public function __construct()
    {
        $this->m_dosen = new m_dosen();
    }

    public function Data_Dosen(): string
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

    public function input()
    {
        $data = [
            'title' => 'Input Data Mahasiswa'
        ];
        return view('/dosen/input', $data);
    }

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
            ]
        ];
        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        // if(!$this->validate($m_user->getValidationRules())){
        // 	session()->setFlashdata('errors',$this->validator->listErrors());
        // 	return redirect()->back();
        // }
        $this->m_dosen->save([
            '212395_NIDN' => $this->request->getVar('212395_NIDN'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_jkl' => $this->request->getVar('212395_jkl'),
            '212395_Kontak' => $this->request->getVar('212395_Kontak'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dosen/Data_Dosen');
    }
}
