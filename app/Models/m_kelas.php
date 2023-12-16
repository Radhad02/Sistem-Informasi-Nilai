<?php

namespace App\Models;

use CodeIgniter\Model;

class m_kelas extends Model
{
    protected $table            = 'kelas_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Kode', '212395_Ruangan', '212395_Id_Dosen', '212395_Id_Matkul'];

    public function allData()
    {
        return $this->db->table('kelas_212395')
            ->join('dosen_212395', 'dosen_212395.212395_Id = kelas_212395.212395_Id_Dosen', 'left')
            ->join('matakuliah_212395', 'matakuliah_212395.212395_Id = kelas_212395.212395_Id_Matkul', 'left')
            ->select('*, kelas_212395.212395_Kode as kode , kelas_212395.212395_Id as id_kelas')
            ->Get()->getResultArray();
    }

    public function insertData($data)
    {
        $builder = $this->db->table('kelas_212395');
        $builder->insert($data);
    }

    public function AllMatkul()
    {
        return $this->db->table('matakuliah_212395')
            ->Get()->getResultArray();
    }

    public function AllDosen()
    {
        return $this->db->table('dosen_212395')
            ->Get()->getResultArray();
    }

    public function AllMahasiswa()
    {
        return $this->db->table('mahasiswa_212395')
            ->Get()->getResultArray();
    }


    // public function All()
    // {
    //     return $this->db->table('kelas_mahasiswa_212395')
    //         ->join('mahasiswa_212395', 'mahasiswa_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Mahasiswa', 'left')
    //         ->join('kelas_212395', 'kelas_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Kelas', 'left')
    //         ->join('matakuliah_212395', 'matakuliah_212395.212395_Id=kelas_mahasiswa_212395.212395_Id_Matkul', 'left')
    //         ->Get()->getResultArray();
    // }
}
