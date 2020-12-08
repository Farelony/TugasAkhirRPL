<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'alamat', 'jenis_user', 'foto', 'nohp'];

    public function getJenisUser($email)
    {
        return $this->where(['email' => $email])->first();
    }
    public function getUser($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
