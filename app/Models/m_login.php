<?php

namespace App\Models;

use CodeIgniter\Model;

class m_login extends Model
{
    protected $table            = 'user_212395';
    protected $primaryKey       = '212395_Id';

    function auth_admin($username, $password)
    {
        return $this->db->table('user_212395')->where([
            '212395_Username' => $username,
            '212395_Pass' => $password,

        ])->get()->getRowArray();
    }
}
