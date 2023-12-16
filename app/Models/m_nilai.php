<?php

namespace App\Models;

use Config\Services;
use CodeIgniter\Model;

class m_nilai extends Model
{
    protected $db;
    protected $session;
    protected $table            = 'nilai_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Id_Mahasiswa', '212395_Kehadiran', '212395_Tugas', '212395_Mid', '212395_Final', '212395_Keterangan', '212395_Input'];


    // public function __construct()
    // {
    //     $this->db = \Config\Database::connect();
    //     $this->session = Services::session();
    // }

    public function getId($idNilai = false)
    {
        if ($idNilai == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $idNilai])->first();
    }

    public function allData()
    {
        return $this->db->table('nilai_212395')
            ->join('mahasiswa_212395', 'mahasiswa_212395.212395_Id=nilai_212395.212395_Id_Mahasiswa', 'left')
            ->Get()->getResultArray();
    }

    public function mahasiswa($nama)
    {
        return $this->db->table('mahasiswa_212395')
            ->where('212395_Nama', $nama)
            ->Get()->getResultArray();
    }

    public function allMahasiswa($namaDosen)
    {
        return $this->db->table('nilai_212395')
            ->join('mahasiswa_212395', 'mahasiswa_212395.212395_Id=nilai_212395.212395_Id_Mahasiswa', 'left')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=nilai_212395.212395_Id_Matkul', 'left')
            ->select('*, nilai_212395.212395_Id as Id_nilai ')
            ->where('nilai_212395.212395_Nama_Dosen', $namaDosen)
            ->Get()->getResultArray();
    }

    public function insertData($data)
    {
        $builder = $this->db->table('nilai_212395');
        $builder->insert($data);
    }

    public function AllKelas()
    {
        return $this->db->table('kelas_212395')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=kelas_212395.212395_Id_Matkul', 'left')
            ->select('*, kelas_212395.212395_Kode as kode_kelas')
            ->Get()->getResultArray();
    }

    // public function All()
    // {
    //     return $this->db->table('kelas_mahasiswa_212395')
    //         ->join('mahasiswa_212395 as m', 'm.212395_Id=kelas_mahasiswa_212395.212395_Id_Mahasiswa', 'left')
    //         ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Matkul', 'left')
    //         ->join('kelas_212395', 'kelas_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Kelas', 'left')
    //         ->Get()->getResultArray();
    // }

    public function getMahasiswaByKodeKelas($kodeKelas)
    {
        return $this->db->table('kelas_mahasiswa_212395')
            ->join('mahasiswa_212395 as m', 'm.212395_Id=kelas_mahasiswa_212395.212395_Id_Mahasiswa', 'left')
            ->join('kelas_212395', 'kelas_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Kelas', 'left')
            ->select('*, m.212395_Id as Id_Mahasiswa , m.212395_Nama as namaMHS')
            ->where('kelas_212395.212395_Kode', $kodeKelas)
            ->Get()->getResultArray();
    }

    public function getKelasByNama($namaDosen)
    {
        return $this->db->table('kelas_212395')
            ->join('dosen_212395', 'dosen_212395.212395_Id = kelas_212395.212395_Id_Dosen', 'left')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id = kelas_212395.212395_Id_Matkul', 'left')
            ->select('*, kelas_212395.212395_Kode as kode , kelas_212395.212395_Id as id_kelas')
            ->where('dosen_212395.212395_Nama_Dosen', $namaDosen)
            ->Get()->getResultArray();
    }

    public function nilaiMahasiswa($nama)
    {
        return $this->db->table('nilai_212395')
            ->join('mahasiswa_212395', 'mahasiswa_212395.212395_Id=nilai_212395.212395_Id_Mahasiswa', 'left')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=nilai_212395.212395_Id_Matkul', 'left')
            // ->select('*, kelas_212395.212395_Kode as kode , kelas_212395.212395_Id as id_kelas')
            ->where('mahasiswa_212395.212395_Nama', $nama)
            ->Get()->getResultArray();
    }
}
