<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TanamanModel;

class Penjual extends BaseController
{
    protected $userModel;
    protected $tanamanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->tanamanModel = new TanamanModel();
    }
    public function index()
    {
        $nama = session()->get('nama');
        if ($nama) {
            $user = $this->userModel->getJenisUser(session()->get('email'));
            $tanaman = $this->tanamanModel->getTanaman(session()->get('id'));
            $data = [
                'title' => 'Home',
                'nama' => $user['nama'],
                'email' => $user['email'],
                'foto' => $user['foto'],
                'alamat' => $user['alamat'],
                'nohp' => $user['nohp'],
                'tanaman' => $tanaman
            ];
            return view('Penjual/index', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function profil()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Home',
            'nama' => $user['nama'],
            'email' => $user['email'],
            'foto' => $user['foto'],
            'alamat' => $user['alamat'],
            'nohp' => $user['nohp'],
        ];
        return view('Penjual/profil', $data);
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
        return view('penjual/editProfil', $data);
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
            return  redirect()->to('/penjual/editProfil')->withInput();
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
        return redirect()->to('/penjual/profil');
    }
    public function tambah()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Tambah Tanaman',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'alamat' => $user['alamat'],
            'nohp' => $user['nohp'],
            'validation' => \Config\Services::validation()
        ];
        return view('penjual/tambahTanaman', $data);
    }
    public function addTanaman()
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        helper(['form', 'url']);
        if (!$this->validate([
            'namaTanaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tanaman Harus Diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus Diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Harus Diisi'
                ]
            ],
            'tips' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tips Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('/penjual/tambah')->withInput();
        }
        $fotoTanaman = $this->request->getFile('foto');
        if ($fotoTanaman->getError() == 4) {
            return redirect()->to('/penjual/tambah')->withInput();
        }
        $namaFoto = $fotoTanaman->getRandomName();
        $this->tanamanModel->save([
            'idPenjual' => session()->get('id'),
            'namaTanaman' => $this->request->getVar('namaTanaman'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tips' => $this->request->getVar('tips'),
            'foto' => $namaFoto
        ]);
        $fotoTanaman->move('img/tanaman/', $namaFoto);
        session()->setFlashdata('pesan', 'Tanaman Berhasil Ditambah');
        return redirect()->to('/penjual');
    }
    public function editTanaman($id)
    {
        $tanaman = $this->tanamanModel->getSpesifik($id);
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $data = [
            'title' => 'Edit Tanaman',
            'nama' => $user['nama'],
            'foto' => $user['foto'],
            'alamat' => $user['alamat'],
            'nohp' => $user['nohp'],
            'tanaman' => $tanaman,
            'validation' => \Config\Services::validation()
        ];
        return view('penjual/editTanaman', $data);
    }
    public function updateTanaman($id)
    {
        $user = $this->userModel->getJenisUser(session()->get('email'));
        $tanaman = $this->tanamanModel->getSpesifik($id);
        helper(['form', 'url']);
        if (!$this->validate([
            'namaTanaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tanaman Harus Diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus Diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Harus Diisi'
                ]
            ],
            'tips' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tips Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('/penjual/editTanaman/' . $id)->withInput();
        }
        $fotoBaru = $this->request->getFile('foto');
        if ($fotoBaru->getError() == 4) {
            $namaFoto = $this->request->getVar('fotolama');
        } else {
            $namaFoto = $fotoBaru->getRandomName();
            $fotoBaru->move('img/tanaman/', $namaFoto);
            unlink('img/tanaman/' . $tanaman['foto']);
        }
        $this->tanamanModel->save([
            'idTanaman' => $id,
            'idPenjual' => $user['id'],
            'namaTanaman' => $this->request->getVar('namaTanaman'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tips' => $this->request->getVar('tips'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data tanaman berhasil diubah');
        return redirect()->to('/penjual');
    }
    public function hapusTanaman($id)
    {
        $tanaman = $this->tanamanModel->getSpesifik($id);
        unlink('img/tanaman/' . $tanaman['foto']);
        $this->tanamanModel->delete($id);
        session()->setFlashdata('pesan', 'Data tanaman berhasil dihapus');
        return redirect()->to('/penjual');
    }
}
