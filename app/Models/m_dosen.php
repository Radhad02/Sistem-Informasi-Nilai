<?php

namespace App\Models;

use CodeIgniter\Model;

class m_dosen extends Model
{
    protected $table            = 'dosen_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_NIDN', '212395_Nama', '212395_Alamat', '212395_Tanggal_Lahir', '212395_jkl', '212395_Kontak'];

    public function getId($Id = false)
    {
        if ($Id == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $Id])->first();
    }
}
