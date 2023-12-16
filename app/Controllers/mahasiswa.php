<?php

namespace App\Controllers;

use App\Models\m_mahasiswa;
use App\Models\m_user;
use Dompdf\Dompdf;
use Dompdf\Options;


class Mahasiswa extends BaseController
{

    protected $m_mahasiswa;
    protected $m_user;
    public function __construct()
    {
        $this->m_mahasiswa = new m_mahasiswa();
        $this->m_user = new m_user();
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


    // Fungsi Input
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


    //Fungsi Delete
    public function delete($idmahasiswa)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_mahasiswa->delete($idmahasiswa);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/mahasiswa/Data_Mahasiswa');
    }


    //Fungsi Edit
    public function edit($idmahasiswa)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'datamahasiswa' => $this->m_mahasiswa->getId($idmahasiswa)
        ];
        return view('mahasiswa/edit', $data);
    }


    //Fungsi Update
    public function update($idmahasiswa)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Nim' => [
                'rules' => 'required|is_unique[mahasiswa_212395.212395_Nim]|numeric',

                'errors' => [
                    'required' => 'Nim Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka',
                ]
            ],
            '212395_Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            '212395_Tanggal_Lahir' => [
                //'rules' => 'required|is_valid_birth_date',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi.',
                    'is_valid_birth_date' => 'Tanggal Lahir tidak boleh di atas tahun 2006.',
                ],
            ],
            '212395_Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            '212395_Jkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Kelamin'
                ]
            ],
            '212395_Jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan Harus Dipilih'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        $this->m_mahasiswa->save([
            '212395_Id' => $idmahasiswa,
            '212395_Nim' => $this->request->getVar('212395_Nim'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_Jurusan' => $this->request->getVar('212395_Jurusan'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/mahasiswa/Data_Mahasiswa');
    }


    // Fungsi Simpan Data
    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }

        $rules = [
            '212395_Nim' => [
                'rules' => 'required|is_unique[mahasiswa_212395.212395_Nim]|numeric',

                'errors' => [
                    'required' => 'Nim Harus Diisi.',
                    'is_unique' => 'Nim Sudah Terdaftar.',
                    'numeric' => 'Wajib Angka',
                ]
            ],
            '212395_Nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            '212395_Tanggal_Lahir' => [
                //'rules' => 'required|is_valid_birth_date',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi.',
                    'is_valid_birth_date' => 'Tanggal Lahir tidak boleh di atas tahun 2006.',
                ],
            ],
            '212395_Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            '212395_Jkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Kelamin'
                ]
            ],
            '212395_Jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan Harus Dipilih'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $this->m_mahasiswa->save([
            '212395_Nim' => $this->request->getVar('212395_Nim'),
            '212395_Nama' => $this->request->getVar('212395_Nama'),
            '212395_Alamat' => $this->request->getVar('212395_Alamat'),
            '212395_Tanggal_Lahir' => $this->request->getVar('212395_Tanggal_Lahir'),
            '212395_Jkl' => $this->request->getVar('212395_Jkl'),
            '212395_Jurusan' => $this->request->getVar('212395_Jurusan'),
        ]);

        $nim = 'm' . $this->request->getVar('212395_Nim');
        $level = 'mahasiswa';

        $data = [
            '212395_Username' => $this->request->getVar('212395_Nama'),
            '212395_Pass' => $nim,
            '212395_Level' => $level,
            '212395_Nama' => $this->request->getVar('212395_Nama'),
        ];
        $this->m_user->insertData($data);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/mahasiswa/Data_Mahasiswa');
    }


    //Fungsi Export Data Ke PDF
    public function export_pdf()
    {
        helper('url');
        $data = [
            'mahasiswa' => $this->m_mahasiswa->findAll(),
            'title' => 'pdf'

        ];

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load the view file into the HTML variable
        $html = view('mahasiswa/export_pdf', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first rendering pass to get the total pages)
        $dompdf->render();

        // Stream the file
        $dompdf->stream('Data_Mahasiswa.pdf', ['Attachment' => false]);
    }
}
