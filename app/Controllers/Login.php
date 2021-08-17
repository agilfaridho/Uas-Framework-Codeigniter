<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = ['tittle' => 'Form Login User'];
        return view('v_login', $data);
    }
    public function process()
    {
        $username = $this->request->getVar('username');
        $pass = $this->request->getVar('pass');
        $data = $this->userModel->where('username', $username)->first();
        if ($data) {
            $pw = $data['pass'];
            $verify_pass = password_verify($pass, $pw);
            if ($verify_pass) {
                session()->set([
                    'nama_user'     => $data['nama_user'],
                    'logged_in'     => TRUE,
                ]);
                return redirect()->to('/karyawan');
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to('/ ');
            }
        } else {
            session()->setFlashdata('error', 'Username Tidak Di Temukan');
            return redirect()->to('/ ');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/ ');
    }
}
