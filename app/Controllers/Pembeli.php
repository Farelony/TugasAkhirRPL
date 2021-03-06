<?php

namespace App\Controllers;

use App\Models\KeluhanModel;
use App\Models\UserModel;
use App\Models\TanamanModel;

class Pembeli extends BaseController
{
    protected $userModel;
    protected $tanamanModel;
    protected $keluhanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->tanamanModel = new TanamanModel();
        $this->keluhanModel = new KeluhanModel();
    }
    public function index()
    {
        $nama = session()->get('nama');
        if ($nama) {
            $tanaman = $this->tanamanModel->orderBy('idTanaman', 'DESC')->findAll();
            $user = $this->userModel->getJenisUser(session()->get('email'));
            $data = [
                'title' => 'Home',
                'nama' => $user['nama'],
                'foto' => $user['foto'],
                'tanaman' => $tanaman
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
    public function listproduk()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $tanaman = $this->tanamanModel->search($keyword)->findAll();
        } else {
            $tanaman = $this->tanamanModel->findAll();
        }
        $data = [
            'title' => 'List Produk',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'tanaman' => $tanaman,
        ];
        return view('pembeli/listproduk', $data);
    }
    public function detail($id)
    {
        $tanaman = $this->tanamanModel->getSpesifik($id);
        $penjual = $this->userModel->getUser($tanaman['idPenjual']);
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $tanamanPenjual = $this->tanamanModel->getTanaman($penjual['id']);
        $data = [
            'title' => 'Detail',
            'tanaman' => $tanaman,
            'penjual' => $penjual,
            'id' => $user['id'],
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'tanamanpenjual' => $tanamanPenjual
        ];
        return view('pembeli/detail', $data);
    }
    public function lapor($pembeli, $penjual)
    {
        $penjual = $this->userModel->getUser($penjual);
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Laporkan Penjual',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'penjual' => $penjual,
            'id' => $pembeli,
            'validation' => \Config\Services::validation()
        ];
        return view('pembeli/lapor', $data);
    }
    public function report()
    {
        helper(['form', 'url']);
        $idPembeli = $this->request->getVar('pembeli');
        $idPenjual = $this->request->getVar('penjual');
        if (!$this->validate([
            'keluhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keluhan Harus Diisi'
                ]
            ]
        ])) {
            return  redirect()->to('/pembeli/lapor/' . $idPembeli . '/' . $idPenjual)->withInput();
        }
        $buktiKeluhan = $this->request->getFile('foto');
        if ($buktiKeluhan->getError() == 4) {
            return  redirect()->to('/pembeli/lapor/' . $idPembeli . '/' . $idPenjual);
        } else {
            $namaFoto = $buktiKeluhan->getRandomName();
            $buktiKeluhan->move('img/keluhan/', $namaFoto);
        }
        $this->keluhanModel->save([
            'idPenjual' => $idPenjual,
            'idPembeli' => $idPembeli,
            'keluhan' => $this->request->getVar('keluhan'),
            'bukti' => $namaFoto,
            'Status' => False
        ]);
        session()->setFlashdata('pesan', 'Keluhan berhasil dilaporkan');
        return redirect()->to('/pembeli');
    }
}
