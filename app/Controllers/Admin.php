<?php

namespace App\Controllers;

use App\Models\KeluhanModel;
use App\Models\UserModel;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Admin extends BaseController
{
    protected $userModel;
    protected $keluhanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->keluhanModel = new KeluhanModel();
    }
    public function index()
    {
        $keluhan = $this->keluhanModel->findKeluhan();
        if ($keluhan == null) {
            $pembeli = [];
            $penjual = [];
        } else {
            foreach ($keluhan as $k) {
                $pembeli[] = $this->userModel->getUser($k['idPembeli']);
                $penjual[] = $this->userModel->getUser($k['idPenjual']);
            }
        }
        $data = [
            'keluhan' => $keluhan,
            'pembeli' => $pembeli,
            'penjual' => $penjual
        ];
        return view('/admin/index', $data);
    }
    public function verifikasi($id)
    {
        $keluhan = $this->keluhanModel->findKeluhan($id);
        $this->keluhanModel->save(
            [
                'idKeluhan' => $keluhan['idKeluhan'],
                'idPenjual' => $keluhan['idPenjual'],
                'idPembeli' => $keluhan['idPembeli'],
                'keluhan' => $keluhan['keluhan'],
                'bukti' => $keluhan['bukti'],
                'status' => True
            ]
        );
        return redirect()->to('/admin');
    }
}
