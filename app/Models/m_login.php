<?php

namespace App\Models;

use CodeIgniter\Model;

class m_login extends Model
{
    protected $table            = 'admin_212395';
    protected $primaryKey       = '212395_Id';
    // protected $allowedFields    = ['212369_Nama'];

    function auth_admin($username, $password)
    {
        return $this->db->table('admin_212395')->where([
            '212395_Id' => $username,
            '212395_pass' => $password,

        ])->get()->getRowArray();
    }
}
