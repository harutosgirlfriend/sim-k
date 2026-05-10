<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PengajuanModel;
class Home extends BaseController
{
       protected $userModel;

    public function __construct()
    {
    
        $this->userModel = new UserModel();

    }
    public function index(): string
    {
        return view('admin/dashboard');
    }
    public function login(): string
    {
        return view('peserta/login');
    }
    public function registrasi(): string
    {
        return view('peserta/registrasi');
    }
    public function peserta()
    {
        $user = $this->userModel->findAll();
        // var_dump($user);
        
        return view('peserta/home',['user'=> $user]);
    }
    public function pengajuan()
    {
        $user = $this->userModel->findAll();
        // var_dump($user);
        
        return view('peserta/pengajuan',['user'=> $user]);
    }
    public function cara_pengajuan()
    {
        $user = $this->userModel->findAll();
        // var_dump($user);
        
        return view('peserta/cara_pengajuan',['user'=> $user]);
    }
    public function tentang_pengajuan()
    {
        $user = $this->userModel->findAll();
        // var_dump($user);
        
        return view('peserta/tentang_pengajuan',['user'=> $user]);
    }
    public function admin()
    {
       $pengajuanModel = new PengajuanModel();

        $data['pengajuan'] = $pengajuanModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('admin/dashboard', $data);
   
    }
}
