<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table            = 'mahasiswa_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Nim', '212395_Nama', '212395_Alamat', '212395_Tanggal_Lahir', '212395_Jkl', '212395_Jurusan'];

    public function getId($Id = false)
    {
        if ($Id == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $Id])->first();
    }
}
