<?php

namespace App\Models;

use CodeIgniter\Model;

class m_nilai extends Model
{
    protected $table            = 'nilai_212395';
    protected $primaryKey       = '212395_Id';
    protected $allowedFields    = ['212395_Nim', '212395_Nama', '212395_Kehadiran', '212395_Tugas', '212395_Mid', '212395_Final', '212395_Keterangan'];

    public function getId($Id = false)
    {
        if ($Id == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $Id])->first();
    }
}
