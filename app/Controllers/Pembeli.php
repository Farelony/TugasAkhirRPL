<?php

namespace App\Controllers;

class Pembeli extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'id' => session()->get('id'),
            'nama' => session()->get('nama'),
            'email' => session()->get('email'),
            'alamat' => session()->get('alamat'),
            'foto' => session()->get('foto'),
            'nohp' => session()->get('nohp'),
        ];
        d($data);
        return view('pembeli/index', $data);
    }
}
