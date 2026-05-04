<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;


class Auth extends BaseController
{
    public function login()
    {
        return view('peserta/login');
    }

    public function prosesLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        $messages = [
            'email' => [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Format email tidak valid'
            ],
            'password' => [
                'required' => 'Password wajib diisi'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

  
        $user = $model->where('email', $this->request->getPost('email'))
            ->asObject()
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error_login', 'Email tidak ditemukan');
        }

        if (!password_verify($this->request->getPost('password'), $user->password)) {
            return redirect()->back()
                ->withInput()
                ->with('error_login', 'Password salah');
        }

        session()->set([
            'user_id' => $user->id,
            'nama' => $user->nama,
            'email' => $user->email,
            'role' => $user->role,
            'logged_in' => true
        ]);

     
        if ($user->role == 'admin') {
            return redirect()->to('/admin/index'); 
        } else {
            return redirect()->to('/peserta/index');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function registrasi()
    {
        return view('peserta/registrasi'); // sesuaikan path view kamu
    }

    public function simpanRegistrasi()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama wajib diisi',
                'min_length' => 'Nama minimal 3 karakter'
            ],
            'email' => [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Format email tidak valid',
                'is_unique' => 'Email sudah terdaftar'
            ],
            'password' => [
                'required' => 'Password wajib diisi',
                'min_length' => 'Password minimal 6 karakter'
            ],
            'confirm_password' => [
                'required' => 'Konfirmasi password wajib diisi',
                'matches' => 'Password tidak sama'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => 'peserta',
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->insert($data);

        return redirect()->to('/')->with('success', 'Registrasi berhasil, silakan login');
    }
}
