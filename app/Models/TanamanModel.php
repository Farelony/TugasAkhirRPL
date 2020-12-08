<?php

namespace App\Models;

use CodeIgniter\Model;

class TanamanModel extends Model
{
    protected $table = 'tanamanhias';
    protected $primaryKey = 'idTanaman';
    protected $allowedFields = ['idTanaman', 'idPenjual', 'namaTanaman', 'harga', 'deskripsi', 'tips', 'foto'];
    public function getTanaman($id)
    {
        return $this->where(['idPenjual' => $id])->findAll();
    }
    public function getSpesifik($id)
    {
        return $this->where(['idTanaman' => $id])->first();
    }
}
