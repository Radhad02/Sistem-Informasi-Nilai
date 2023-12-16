<?php

namespace App\Models;

use CodeIgniter\Model;

class m_matkul extends Model
{
    protected $table            = 'matakuliah_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Kode', '212395_Nama_Matkul', '212395_SKS', '212395_Id_Dosen'];

    public function allData()
    {
        return $this->db->table('matakuliah_212395') // Memberikan alias 'm' pada tabel 'matakuliah_212395'
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $builder = $this->db->table('matakuliah_212395');
        $builder->insert($data);
    }

    public function AllDosen()
    {
        return $this->db->table('dosen_212395')
            ->Get()->getResultArray();
    }
}
