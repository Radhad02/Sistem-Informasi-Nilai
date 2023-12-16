<?php

namespace App\Controllers;

use App\Models\m_nilai;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nilai extends BaseController
{
    protected $m_nilai;

    public function __construct()
    {
        $this->m_nilai = new m_nilai();
    }
    public function Data_Nilai()
    {
        $idNilai = session('nama');
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $data = [

            'title' => 'Data Nilai',
            'pager' => $this->m_nilai->pager,
            'all' => $this->m_nilai->AllKelas(),
            'currentPage' => $currentPage,
            'dosen' =>  $this->m_nilai->getKelasByNama($idNilai),
        ];
        return view('/nilai/index', $data);
    }

    public function detail()
    {
        $data = [
            'title' => 'Data Nilai Mahasiswa',
            'mahasiswa' => $this->m_nilai->allData()
        ];
        return view('nilai/detail', $data);
    }

    public function input()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $kodeKelas = session()->get('kodeKelas');
        $data = [
            'title' => 'Input Data Nilai',
            // 'nilai' => $this->m_nilai->All(),
            'kodeKelas' => $kodeKelas,
        ];
        return view('/nilai/input', $data);
    }

    public function edit($idNilai)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'data' => $this->m_nilai->find($idNilai),
        ];
        return view('nilai/edit', $data);
    }


    //Fungsi Update Data
    public function update($idNilai)
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

        $this->m_nilai->update($idNilai, [
            '212395_Id_Matkul' => $this->request->getVar('212395_Id_Matkul'),
            '212395_Kelas' => $this->request->getVar('212395_Kelas'),
            '212395_Kehadiran' => $this->request->getVar('212395_Kehadiran'),
            '212395_Tugas' => $this->request->getVar('212395_Tugas'),
            '212395_Mid' => $this->request->getVar('212395_Mid'),
            '212395_Final' => $this->request->getVar('212395_Final'),
            '212395_Keterangan' => $this->request->getVar('212395_Keterangan'),
            '212395_Status' => $this->request->getVar('212395_Input'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/nilai/coba');
    }

    public function save()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $rules = [
            '212395_Id_Mahasiswa' => [
                //'rules' => 'is_unique[nilai_212395.212395_Id_Mahasiswa]',
                'errors' => [
                    'is_unique' => 'Id Sudah Terdaftar.',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            // session()->setFlashdata('errors',$this->validator->listErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }
        $kodeKelas = session()->get('kodeKelas');
        $namadosen = session()->get('nama');
        $nim = $this->request->getPost('212395_Id_Mahasiswa');
        $nim = (int)$nim; // Ubah ke integer
        $data = [
            '212395_Id_Mahasiswa' => $nim,
            '212395_Nama_Dosen' => $namadosen,
            '212395_Id_Matkul' => $this->request->getVar('212395_Id_Matkul'),
            '212395_Kelas' => $this->request->getVar('212395_Kelas'),
            '212395_Kehadiran' => $this->request->getVar('212395_Kehadiran'),
            '212395_Tugas' => $this->request->getVar('212395_Tugas'),
            '212395_Mid' => $this->request->getVar('212395_Mid'),
            '212395_Final' => $this->request->getVar('212395_Final'),
            '212395_Keterangan' => $this->request->getVar('212395_Keterangan'),
            '212395_Status' => $this->request->getVar('212395_Input'),
        ];
        $this->m_nilai->insertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/nilai/listM/' . $kodeKelas);
    }

    public function listM($kodeKelas)
    {
        session()->set('kodeKelas', $kodeKelas);

        $data = [
            'mahasiswa' => $this->m_nilai->getMahasiswaByKodeKelas($kodeKelas),
            'aksi' => $this->m_nilai->allData(),
            'title' => 'Data Kelas ' . $kodeKelas,
            'kode' =>  $kodeKelas,
        ];
        return view('nilai/listM', $data);
    }

    public function coba()
    {
        $namaDosen = session('nama');
        $data = [
            'mahasiswa' => $this->m_nilai->allMahasiswa($namaDosen),
            'title' => 'Data Nilai Mahasiswa '
        ];
        return view('nilai/mahasiswaKelas', $data);
    }

    public function nilaiMahasiswa()
    {
        $nama = session('username');
        $kodeKelas = session()->get('kodeKelas');
        $data = [
            'mahasiswa' => $this->m_nilai->nilaiMahasiswa($nama),
            'mhs' => $this->m_nilai->mahasiswa($nama),
            'title' => 'Data Nilai',
            'nama' => $nama,
            'kodeKelas' => $kodeKelas,
        ];
        return view('nilai/nilaiMahasiswa', $data);
    }

    // public function export_pdf()
    // {
    //     // $dataToSend = json_decode($this->request->getPost('dataToSend'), true);
    //     $ipk = $this->request->getPost('coba');
    //     $totalSKS = $this->request->getVar('totalSKS');
    //     $totalNilai = $this->request->getVar('totalNilai');
    //     $nama = session('username');
    //     $kodeKelas = session()->get('kodeKelas');

    //     echo 'Data yang diterima dari Ajax:';
    //     echo '<pre>';
    //     print_r($ipk);
    //     echo '</pre>';


    //     $data = [
    //         'mahasiswa' => $this->m_nilai->nilaiMahasiswa($nama),
    //         'mhs' => $this->m_nilai->mahasiswa($nama),
    //         'title' => 'Data Nilai',
    //         'nama' => $nama,
    //         'kodeKelas' => $kodeKelas,
    //         'ipk' => $ipk,
    //     ];
    //     return view('nilai/nilaiPDF', $data);
    // }

    public function export_pdf()
    {
        // Mendapatkan data yang dikirimkan dari view
        $nama = $this->request->getVar('nama');
        $umur = $this->request->getPost('umur');
        $pekerjaan = $this->request->getPost('pekerjaan');

        // Misalnya, kirim respons JSON
        return $this->response->setJSON([
            'nama' => $nama,
            'umur' => $umur,
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function nama_metode()
    {
        if ($this->request->isAJAX()) {
            // Mendapatkan data yang dikirimkan dari view dalam permintaan Ajax
            $nama = $this->request->getPost('nama');
            $umur = $this->request->getPost('umur');
            $pekerjaan = $this->request->getPost('pekerjaan');

            // Lakukan sesuatu dengan data yang diterima dari permintaan Ajax

            // Misalnya, kirim respons JSON
            return $this->response->setJSON([
                'nama' => $nama,
                'umur' => $umur,
                'pekerjaan' => $pekerjaan,
                'is_ajax' => true, // Anda dapat menambahkan indikator bahwa ini adalah permintaan Ajax
            ]);
        } else {
            // Tangani jika ini bukan permintaan Ajax
            return $this->response->setJSON([
                'is_ajax' => false, // Tandai bahwa ini bukan permintaan Ajax
                'pesan' => 'Ini bukan permintaan Ajax',
            ]);
        }
    }


    public function pdf()
    {
        helper('url');
        $nama = session('username');
        $kodeKelas = session()->get('kodeKelas');
        $data = [
            'mahasiswa' => $this->m_nilai->nilaiMahasiswa($nama),
            'mhs' => $this->m_nilai->mahasiswa($nama),
            'title' => 'Data Nilai',
            'nama' => $nama,
            'kodeKelas' => $kodeKelas,
        ];

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load the view file into the HTML variable
        $html = view('nilai/nilaiPDF', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first rendering pass to get the total pages)
        $dompdf->render();

        // Stream the file
        $dompdf->stream('Data_Mahasiswa.pdf', ['Attachment' => false]);
    }

    public function download()
    {
        // Instansiasi Spreadsheet
        $spreadsheet = new Spreadsheet();
        // styling
        $style = [
            'font'      => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($style); // tambahkan style
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(30); // setting tinggi baris
        // setting lebar kolom otomatis
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        // set kolom head
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. Produk')
            ->setCellValue('C1', 'Nama Produk')
            ->setCellValue('D1', 'Kategori')
            ->setCellValue('E1', 'Harga')
            ->setCellValue('F1', 'Stok');
        $row = 2;
        // looping data item
        foreach ($this->m_nilai->allData() as $key => $data) {
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $key + 1)
                ->setCellValue('B' . $row, $data->no_produk)
                ->setCellValue('C' . $row, $data->produk)
                ->setCellValue('D' . $row, $data->kategori)
                ->setCellValue('E' . $row, $data->harga)
                ->setCellValue('F' . $row, $data->stok);
            $row++;
        }
        // tulis dalam format .xlsx
        $writer   = new Xlsx($spreadsheet);
        $namaFile = 'Daftar_Stok_Produk_' . date('d-m-Y');
        // Redirect hasil generate xlsx ke web browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $namaFile . '.xlsx');
        $writer->save('php://output');
    }
}
