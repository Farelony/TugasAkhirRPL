<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class KeluhanModel extends Model
{
    protected $table = 'keluhan';
    protected $primaryKey = 'idKeluhan';
    protected $allowedFields = ['idPenjual', 'idPembeli', 'keluhan', 'bukti', 'status'];

    public function findKeluhan($id = False)
    {
        if (!$id) {
            return $this->where(['status' => False])->findAll();
        } else {
            return $this->where(['idKeluhan' => $id])->first();
        }
    }
}
