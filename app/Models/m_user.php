<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
    protected $table            = 'user_212395';
    protected $primaryKey       = '212395_Id'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212395_Username',  '212395_Pass',  '212395_Level'];

    public function getUsers($iduser = false)
    {
        if ($iduser == false) {
            return $this->findAll();
        }
        return $this->where(['212395_Id' => $iduser])->first();
    }

    public function insertData($data)
    {
        $builder = $this->db->table('user_212395');
        $builder->insert($data);
    }
}
