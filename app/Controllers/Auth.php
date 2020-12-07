<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        $user = $this->userModel->getJenisUser($this->request->getVar('email'));
        if ($user != null) {
            if (password_verify($this->request->getVar('password'), $user['password'])) {
                $dataUser = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'alamat' => $user['alamat'],
                    'foto' => $user['foto'],
                    'nohp' => $user['nohp']
                ];
                session()->set($dataUser);
                if ($user['jenis_user'] == "1") {
                    return redirect()->to('/pembeli');
                } elseif ($user['jenis_user'] == "2") {
                    return redirect()->to('/penjual');
                }
            } else {
                session()->setFlashdata('warning', 'Password anda tidak sesuai');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('warning', 'Email belum terdaftar');
            return redirect()->to('/');
        }
    }

    public function registerbuyer()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registerbuyer', $data);
    }
    public function registerseller()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registerseller', $data);
    }

    public function registration()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah ada',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/auth/registerbuyer')->withInput();
        }
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->userModel->save([
            'nama' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'jenis_user' => $this->request->getVar('jenisuser')
        ]);
        session()->setFlashdata('pesan', 'Data anda berhasil ditambahkan');
        return redirect()->to('/');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    //--------------------------------------------------------------------
}
