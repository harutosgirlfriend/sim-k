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


        $data['pengajuan'] = $this->pengajuanModel->findAll(); // kalau object: ->asObject()->findAll()

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
            'file_surat' => 'uploaded[file_surat]|ext_in[file_surat,pdf,doc,docx]|max_size[file_surat,4096]',
            'status' => 'pending'
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
            'file_surat' => [
                'uploaded' => 'File wajib diupload',
                'ext_in' => 'Harus PDF/DOC/DOCX',
                'max_size' => 'Maks 4MB'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        $gambar = $this->request->getFile('foto_surat');
        $file = $this->request->getFile('file_surat');

        $nama = $this->request->getPost('nama_terlapor');
        $namaBersih = strtolower(preg_replace('/[^a-z0-9]/', '_', $nama));


        $namaGambar = $namaBersih . '_surat_' . time() . '.' . $gambar->getExtension();
        $gambar->move('uploads/gambar', $namaGambar);


        $namaFile = $namaBersih . '_file_' . time() . '.' . $file->getExtension();
        $file->move('uploads/file', $namaFile);

        $this->pengajuanModel->insert([
            'nama_pengaju' => $this->request->getPost('nama_pengaju'),
            'nik_pengaju' => $this->request->getPost('nik_pengaju'),
            'no_hp' => $this->request->getPost('no_hp'),
            'nama_terlapor' => $this->request->getPost('nama_terlapor'),
            'nik_terlapor' => $this->request->getPost('nik_terlapor'),
            'tanggal_kematian' => $this->request->getPost('tanggal_kematian'),
            'foto_surat' => $namaGambar,
            'file_surat' => $namaFile,
            'email' => session()->get('email'),
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim');
    }

    public function setujui($id)
    {
        $this->pengajuanModel->update($id, [
            'status' => 'Disetujui'
        ]);
        $email = \Config\Services::email();
        $email_peserta = $this->pengajuanModel->find($id);


        $email->setTo($email_peserta->email);
        $email->setSubject('HIDUP JOKOWI');
        $email->setMessage('diterima!');

        if (!$email->send()) {
            dd($email->printDebugger(['headers']));
        }

        return redirect()->back();
    }

    public function tolak($id)
    {
        $this->pengajuanModel->update($id, [
            'status' => 'Ditolak'
        ]);
        $email->setTo($email_peserta->email);
        $email->setSubject('HIDUP JOKOWI');
        $email->setMessage('ditolak');

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
}