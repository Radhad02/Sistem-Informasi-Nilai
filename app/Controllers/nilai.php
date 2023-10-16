<?php

namespace App\Controllers;

use App\Models\m_nilai;

class Nilai extends BaseController
{
    protected $m_nilai;
    public function __construct()
    {
        $this->m_nilai = new m_nilai();
    }
    public function Data_Nilai(): string
    {
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [
            'title' => 'Data Dosen',
            'datanilai' => $this->m_nilai->getId(),
            'datanilai' => $this->m_nilai->paginate(10, 'nilai_212395'),
            'pager' => $this->m_nilai->pager,
            'currentPage' => $currentPage
        ];
        return view('/nilai/index', $data);
    }

    public function input()
    {
        $data = [
            'title' => 'Input Data Nilai'
        ];
        return view('/nilai/input', $data);
    }

    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Kehadiran' => [
                // 'rules' => 'required|is_unique[mahasiswa_212395.212395_Kehadiran]|numeric',
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
        $this->m_nilai->save([
            '212395_Kehadiran' => $this->request->getVar('212395_Kehadiran'),
            '212395_Tugas' => $this->request->getVar('212395_Tugas'),
            '212395_Mid' => $this->request->getVar('212395_Mid'),
            '212395_Final' => $this->request->getVar('212395_Final'),
            '212395_Keterangan' => $this->request->getVar('212395_Keterangan'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/dosen/Data_Dosen');
    }
}
