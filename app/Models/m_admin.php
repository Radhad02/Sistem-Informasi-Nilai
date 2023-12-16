<?php

namespace App\Models;

use CodeIgniter\Model;

class m_admin extends Model
{
    protected $table            = 'admin_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Kode_Admin', '212395_Nama', '212395_Alamat', '212395_Kontak'];

    public function getId($idadmin = false)
    {
        if ($idadmin == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $idadmin])->first();
    }

    public function insertData($data)
    {
        $builder = $this->db->table('admin_212395');
        $builder->insert($data);
    }
}
