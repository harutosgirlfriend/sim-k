<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{
    protected $pengajuanModel;

    public function __construct()
    {
        $this->pengajuanModel = new PengajuanModel();
    }
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $tanggal = $this->request->getGet('tanggal');
        $bulan = $this->request->getGet('bulan');
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        $builder = $this->pengajuanModel;

        // SEARCH
        if ($keyword) {
            $builder->groupStart()
                ->like('nama_pengaju', $keyword)
                ->orLike('nik_pengaju', $keyword)
                ->groupEnd();
        }

        // FILTER PER HARI
        if ($tanggal) {
            $builder->where('tanggal_kematian', $tanggal);
        }

        // FILTER PER BULAN
        if ($bulan) {
            $builder->where("DATE_FORMAT(tanggal_kematian, '%Y-%m') =", $bulan);
        }

        // FILTER RENTANG TANGGAL
        if ($startDate && $endDate) {
            $builder->where('tanggal_kematian >=', $startDate);
            $builder->where('tanggal_kematian <=', $endDate);
        }

        // URUTKAN TERBARU
        $builder->orderBy('created_at', 'DESC');

        $data['pengajuan'] = $builder->findAll();

        return view('admin/pengajuan', $data);
    }
    public function simpan()
    {
        $rules = [
            'nama_pengaju' => 'required',
            'nik_pengaju' => 'required|numeric|exact_length[16]',
            'no_hp' => 'required|numeric|min_length[10]|max_length[13]',
            'nama_terlapor' => 'required',
            'nik_terlapor' => 'required|numeric|exact_length[16]|is_unique[pengajuan.nik_terlapor]',
            'tanggal_kematian' => 'required',
            'foto_surat' => 'uploaded[foto_surat]|is_image[foto_surat]|max_size[foto_surat,2048]',
            'foto_ktp_kk' => 'uploaded[foto_ktp_kk]|is_image[foto_ktp_kk]|max_size[foto_ktp_kk,2048]',


        ];

        $messages = [
            'nama_pengaju' => [
                'required' => 'Nama pengaju wajib diisi'
            ],
            'nik_pengaju' => [
                'required' => 'NIK pengaju wajib diisi',
                'numeric' => 'NIK harus angka',
                'exact_length' => 'NIK harus 16 digit'
            ],
            'no_hp' => [
                'required' => 'No HP wajib diisi',
                'numeric' => 'No HP harus angka',
                'min_length' => 'Minimal 10 digit',
                'max_length' => 'Maksimal 13 digit'
            ],
            'nama_terlapor' => [
                'required' => 'Nama terlapor wajib diisi'
            ],
            'nik_terlapor' => [
                'required' => 'NIK terlapor wajib diisi',
                'numeric' => 'NIK harus angka',
                'exact_length' => 'NIK harus 16 digit',
                'is_unique' => 'NIK sudah terdaftar'
            ],
            'tanggal_kematian' => [
                'required' => 'Tanggal wajib diisi'
            ],


            'foto_surat' => [
                'uploaded' => 'Foto surat wajib diupload',
                'is_image' => 'Harus berupa gambar',
                'max_size' => 'Maks 2MB'
            ],
            'foto_ktp_kk' => [
                'uploaded' => 'Foto KTP/KK wajib diupload',
                'is_image' => 'Harus berupa gambar',
                'max_size' => 'Maks 2MB'
            ],

        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        $gambar = $this->request->getFile('foto_surat');
        $gambarkk = $this->request->getFile('foto_ktp_kk');

        $nama = $this->request->getPost('nama_terlapor');
        $namaBersih = strtolower(preg_replace('/[^a-z0-9]/', '_', $nama));


        $namaGambar = $namaBersih . '_surat_' . time() . '.' . $gambar->getExtension();
        $gambar->move('uploads/gambar', $namaGambar);


        $namaGambarKK = $namaBersih . '_foto_ktp_kk' . time() . '.' . $gambarkk->getExtension();
        $gambarkk->move('uploads/file', $namaGambarKK);

        $this->pengajuanModel->insert([
            'nama_pengaju' => $this->request->getPost('nama_pengaju'),
            'nik_pengaju' => $this->request->getPost('nik_pengaju'),
            'no_hp' => $this->request->getPost('no_hp'),
            'nama_terlapor' => $this->request->getPost('nama_terlapor'),
            'nik_terlapor' => $this->request->getPost('nik_terlapor'),
            'tanggal_kematian' => $this->request->getPost('tanggal_kematian'),
            'foto_surat' => $namaGambar,
            'foto_ktp_kk' => $namaGambarKK,
            'status' => 'pending',
            'email' => session()->get('email'),
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim');
    }

    public function setujui($id)
    {
        $this->pengajuanModel->update($id, [
            'status' => 'disetujui'
        ]);
        $email = \Config\Services::email();
        $email_peserta = $this->pengajuanModel->find($id);


        $email->setTo($email_peserta->email);
        $email->setSubject('STATUS PENGAJUAN SURAT KEMATIAN BPJS');
        $email->setMessage('Pengajuan Surat Kematian Anda Telah Diterima

Yth. Peserta BPJS Kesehatan,

Terima kasih telah melakukan pengajuan surat kematian melalui SIM-K

Dengan ini kami menginformasikan surat kematian yang telah Anda kirim BERHASIL dan diproses oleh petugas BPJS Kesehatan. seluruh data dan dokumen yang diajukan DINYATAKAN sesuai dengan ketentuan yang berlaku

Demikian informasi ini disampaikan. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.

Hormat kami,
Admin Sistem Informasi Manajemen Kematian (SIM-K)!');

        if (!$email->send()) {
            dd($email->printDebugger(['headers']));
        }

        return redirect()->back();
    }

    public function tolak($id)
    {
        $this->pengajuanModel->update($id, [
            'status' => 'ditolak'
        ]);
        $email = \Config\Services::email();
        $email_peserta = $this->pengajuanModel->find($id);


        $email->setTo($email_peserta->email);
        $email->setSubject('STATUS PENGAJUAN SURAT KEMATIAN BPJS');
        $email->setMessage('Pengajuan Surat Kematian Anda Telah Diterima 

Yth. Peserta BPJS Kesehatan,

Terima kasih telah melakukan pengajuan surat kematian melalui Sistem Informasi Manajemen Kematian (SIM-K).

Dengan ini kami menginformasikan bahwa pengajuan surat kematian yang telah Anda kirim DITOLAK.

Peserta diharapkan untuk melakukan pengecekan kembali terhadap kelengkapan dan kesesuaian data yang telah diunggah. Apabila terdapat kesalahan atau kekurangan dokumen, peserta dapat melakukan pengajuan ulang sesuai dengan persyaratan yang berlaku pada sistem.

Demikian informasi ini disampaikan. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.

Hormat kami,
Admin Sistem Informasi Manajemen Kematian (SIM-K)');

        if (!$email->send()) {
            dd($email->printDebugger(['headers']));
        }

        return redirect()->back();


    }
    public function detail($nik)
    {
        $data['p'] = $this->pengajuanModel
            ->where('nik_terlapor', $nik)
            ->first();

        return view('admin/detail_pengajuan', $data);
    }
    public function download($file)
    {
        $path = FCPATH . 'uploads/file/' . $file;
        if (!file_exists($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return $this->response->download($path, null);
    }


    public function riwayat()
{
    $pengajuan = $this->pengajuanModel
        ->where('email', session()->get('email'))
        ->orderBy('created_at', 'DESC')
        ->findAll();

    return view('peserta/riwayat_pengajuan', [
        'pengajuan' => $pengajuan
    ]);
}
}