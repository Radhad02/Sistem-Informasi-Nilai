<?php

namespace App\Models;

use CodeIgniter\Model;

class m_kelasM extends Model
{
    protected $table = 'kelas_mahasiswa_212395';
    protected $primaryKey = '212395_Id';

    public function insertData($data)
    {
        $builder = $this->db->table('kelas_mahasiswa_212395');
        $builder->insert($data);
    }

    public function getId($idmahasiswa = false)
    {
        if ($idmahasiswa == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $idmahasiswa])->first();
    }

    public function countMahasiswaWithoutClass()
    {
        $mahasiswaTable = 'mahasiswa_212395'; // Ganti 'nama_tabel_mahasiswa' dengan nama tabel mahasiswa

        $query = $this->db->table($mahasiswaTable);
        $query->whereNotIn('212395_Id', function ($builder) {
            $builder->select('212395_Id_Mahasiswa')->from('kelas_mahasiswa_212395');
        });

        return $query->countAllResults();
    }

    public function All()
    {
        return $this->db->table('kelas_mahasiswa_212395')
            ->join('mahasiswa_212395', 'mahasiswa_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Mahasiswa', 'left')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Matkul', 'left')
            ->join('kelas_212395', 'kelas_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Kelas', 'left')
            ->select('*,kelas_212395.212395_Kode as kode_kelas')
            ->Get()->getResultArray();
    }
    public function AllMahasiswa()
    {
        return $this->db->table('mahasiswa_212395')
            ->Get()->getResultArray();
    }
    public function AllKelas()
    {
        return $this->db->table('kelas_212395')
            ->Get()->getResultArray();
    }
    public function AllDosen()
    {
        return $this->db->table('dosen_212395')
            ->Get()->getResultArray();
    }
    public function AllMatkul()
    {
        return $this->db->table('matakuliah_212395')
            ->Get()->getResultArray();
    }
}
