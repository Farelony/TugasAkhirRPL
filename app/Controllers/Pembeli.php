<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pembeli extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $nama = session()->get('nama');
        if ($nama) {
            $user = $this->userModel->getJenisUser(session()->get('email'));
            $data = [
                'title' => 'Home',
                'nama' => $user['nama'],
                'foto' => $user['foto'],
            ];
            return view('pembeli/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function profil()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Profil Pengguna',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'alamat' => $user['alamat'],
            'nohp' => $user['nohp']
        ];
        return view('pembeli/profil', $data);
    }

    public function editProfil()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Edit Profil',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'alamat' => $user['alamat'],
            'nohp' => $user['nohp'],
            'validation' => \Config\Services::validation()
        ];
        return view('pembeli/editProfil', $data);
    }

    public function edit()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        helper(['form', 'url']);
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ],
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi'
                ]
            ]
        ])) {
            return  redirect()->to('/pembeli/editProfil')->withInput();
        }
        //cek foto
        $fotoBaru = $this->request->getFile('foto');
        $namaFotoLama = $this->request->getVar('fotolama');
        if ($fotoBaru->getError() == 4) {
            $namaFoto = $user['foto'];
        } else {
            $namaFoto = $this->request->getVar('foto');
            if ($namaFotoLama == "default.png") {
                $namaFoto = $fotoBaru->getRandomName();
                $fotoBaru->move('img/user/', $namaFoto);
            } else {
                unlink('img/user/' . $this->request->getVar('fotolama'));
                $namaFoto = $fotoBaru->getRandomName();
                $fotoBaru->move('img/user/', $namaFoto);
            }
        }
        $this->userModel->save([
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto,
            'nohp' => $this->request->getVar('nohp')
        ]);
        session()->setFlashdata('pesan', 'Data diri berhasil diubah');
        return redirect()->to('/pembeli/profil');
    }
}
